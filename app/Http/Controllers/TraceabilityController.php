<?php

namespace App\Http\Controllers;

use App\Models\Traceability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;
use Inertia\Response;

class TraceabilityController extends Controller
{
    /**
     * Display stored traceability submissions in the authenticated layout.
     */
    public function index(): Response
    {
        $records = Traceability::query()
            ->with('qrCodes')
            ->latest()
            ->get()
            ->map(fn (Traceability $traceability) => [
                'id' => $traceability->id,
                'batch' => $traceability->batch,
                'issuer' => $traceability->issuer,
                'origin' => $traceability->origin,
                'variety' => $traceability->variety,
                'score' => $traceability->score,
                'grade' => $traceability->grade,
                'farmer_name' => $traceability->farmer_name,
                'farmer_role' => $traceability->farmer_role,
                'badges_count' => count($traceability->badges ?? []),
                'journey_steps_count' => count($traceability->journey_steps ?? []),
                'qr_codes_count' => $traceability->qrCodes->count(),
                'primary_qr' => optional(
                    $traceability->qrCodes->firstWhere('is_primary', true) ?? $traceability->qrCodes->first()
                )?->only(['label', 'format', 'size', 'payload']),
                'public_url' => route('traceability.show', ['batch' => $traceability->batch]),
                'qr_url' => route('qr.traceability', ['batch' => $traceability->batch, 'size' => 192]),
                'created_at' => optional($traceability->created_at)?->format('F j, Y g:i A'),
            ])
            ->all();

        return Inertia::render('Traceability/Index', [
            'records' => $records,
        ]);
    }

    /**
     * Show the traceability creation form.
     */
    public function create(): Response
    {
        $defaults = $this->flattenPassport($this->passport('UG-ARA-8842'));

        return Inertia::render('Traceability/Create', [
            'defaults' => $defaults,
        ]);
    }

    /**
     * Display the traceability passport for a scanned batch.
     */
    public function show(?string $batch = null): Response
    {
        $batchCode = $batch ?: 'UG-ARA-8842';

        if (Schema::hasTable('traceabilities')) {
            $traceability = Traceability::query()
                ->where('batch', $batchCode)
                ->first();

            if ($traceability) {
                return Inertia::render('Traceability', [
                    'traceability' => $this->fromModel($traceability),
                ]);
            }
        }

        return Inertia::render('Traceability', [
            'traceability' => $this->passport($batchCode),
        ]);
    }

    /**
     * Store a new traceability record.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'batch' => ['required', 'string', 'max:255', 'unique:traceabilities,batch'],
            'issuer' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'url', 'max:2048'],
            'variety' => ['required', 'string', 'max:255'],
            'origin' => ['required', 'string', 'max:255'],
            'score' => ['required', 'string', 'max:255'],
            'grade' => ['required', 'string', 'max:255'],
            'badges' => ['required', 'array', 'min:1'],
            'badges.*.icon' => ['required', 'string', 'max:255'],
            'badges.*.label' => ['required', 'string', 'max:255'],
            'badges.*.classes' => ['nullable', 'string', 'max:255'],
            'impact_cards' => ['required', 'array', 'min:1'],
            'impact_cards.*.icon' => ['required', 'string', 'max:255'],
            'impact_cards.*.title' => ['required', 'string', 'max:255'],
            'impact_cards.*.value' => ['required', 'string', 'max:255'],
            'journey_steps' => ['required', 'array', 'min:1'],
            'journey_steps.*.icon' => ['required', 'string', 'max:255'],
            'journey_steps.*.title' => ['required', 'string', 'max:255'],
            'journey_steps.*.value' => ['required', 'string', 'max:255'],
            'estate_eyebrow' => ['required', 'string', 'max:255'],
            'estate_title' => ['required', 'string', 'max:255'],
            'estate_description' => ['required', 'string'],
            'farmer_image' => ['nullable', 'url', 'max:2048'],
            'farmer_name' => ['required', 'string', 'max:255'],
            'farmer_role' => ['required', 'string', 'max:255'],
            'estate_details' => ['required', 'array', 'min:1'],
            'estate_details.*.label' => ['required', 'string', 'max:255'],
            'estate_details.*.value' => ['required', 'string', 'max:255'],
            'process_eyebrow' => ['required', 'string', 'max:255'],
            'process_title' => ['required', 'string', 'max:255'],
            'process_details' => ['required', 'array', 'min:1'],
            'process_details.*.label' => ['required', 'string', 'max:255'],
            'process_details.*.value' => ['required', 'string', 'max:255'],
            'sensory_profile' => ['required', 'array', 'min:1'],
            'sensory_profile.*.icon' => ['required', 'string', 'max:255'],
            'sensory_profile.*.label' => ['required', 'string', 'max:255'],
            'sensory_profile.*.filled' => ['required', 'integer', 'min:1', 'max:5'],
            'process_note' => ['nullable', 'string'],
            'blockchain_hash' => ['required', 'string', 'max:255'],
            'blockchain_description' => ['required', 'string'],
        ]);

        $validated['badges'] = collect($validated['badges'])
            ->map(fn (array $badge) => [
                'icon' => $badge['icon'],
                'label' => $badge['label'],
                'classes' => $badge['classes'] ?? 'border border-[#d3c3c0]/30 bg-[#e8e8e4] text-[#271310]/70',
            ])
            ->all();

        $traceability = Traceability::create($validated);

        $traceability->qrCodes()->create([
            'label' => 'Primary QR',
            'payload' => route('traceability.show', ['batch' => $traceability->batch], true),
            'format' => 'svg',
            'size' => 192,
            'is_primary' => true,
        ]);

        return redirect()->route('traceability.index');
    }

    /**
     * Build the traceability payload for the page.
     */
    protected function passport(string $batch): array
    {
        return [
            'batch' => $batch,
            'issuer' => 'Coffee Pulse Uganda',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAfIuGEXouopjfj0Jx1sBtgQgmvOTHRoh4fUkrf1l6YuPftAKJWIRBM3BA-oxaNZaxzEAptkhGXsfX180coqwUh_2z9pyZq94l_SDkTmH9YGxCPJpWs_GO-ngXvK4skCGZrbFP9Q1Xhuu0MYCI1sQN4_J32cN8DfJwvHEykyjK8k1f98MgGXZ5jBrJeihTh_aaysWtQVSxI-So4fjBVd_ZYuIML7s3ivK4IUP-0pdXa7_E8npQ1CR77MqV8CflPxsR-af9uaPe6cjo',
            'badges' => [
                ['icon' => 'verified', 'label' => 'Verified', 'classes' => 'bg-[#a3f69c] text-[#002204]'],
                ['icon' => 'eco', 'label' => 'Low-Carbon Lot', 'classes' => 'border border-[#d3c3c0]/30 bg-[#e8e8e4] text-[#271310]/70'],
                ['icon' => 'water_drop', 'label' => 'Eco-Pulped', 'classes' => 'border border-[#d3c3c0]/30 bg-[#e8e8e4] text-[#271310]/70'],
                ['icon' => 'forest', 'label' => 'Agroforestry Verified', 'classes' => 'border border-[#d3c3c0]/30 bg-[#e8e8e4] text-[#271310]/70'],
            ],
            'coffee' => [
                'variety' => 'Arabica (SL-14 & SL-28)',
                'origin' => 'Mount Elgon, Uganda',
                'score' => '87.5',
                'grade' => 'Excellent Specialty Grade',
            ],
            'impactCards' => [
                ['icon' => 'co2', 'title' => 'Carbon Footprint', 'value' => 'Low-Carbon Certified Lot'],
                ['icon' => 'opacity', 'title' => 'Water Stewardship', 'value' => 'Eco-Pulped & Recycled'],
                ['icon' => 'nature', 'title' => 'Sustainability', 'value' => 'Agroforestry Verified'],
            ],
            'journeySteps' => [
                ['icon' => 'potted_plant', 'title' => 'Farming', 'value' => 'Masaka District, Uganda'],
                ['icon' => 'calendar_month', 'title' => 'Harvesting', 'value' => 'October 2024'],
                ['icon' => 'water_drop', 'title' => 'Processing', 'value' => '24h Anaerobic'],
                ['icon' => 'local_shipping', 'title' => 'Export', 'value' => 'Port of Mombasa'],
            ],
            'estate' => [
                'eyebrow' => 'Estate Profile',
                'title' => 'Grown by the Malinga Family',
                'description' => 'The Malinga estate has been producing award-winning Arabica for three generations on the fertile slopes of Mount Elgon. Our direct-trade partnership ensures materially better value returns directly to the cooperative.',
                'farmerImage' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDiPAftpt42x5CsiGBva71fhV83LWqoW2ctJ1TadVZkmJ6BQj-rlbNZyuBfKloKZWgNS2Hx8pSllxtwLK3w-JMZkFlEdpj8oH3qWpkmL5n8icJsWoPdr7iogSl4bDvZK8n8zzGrc0Z6J1iSSwOLLsidMZruwxWHm0MRo0deDjIXM1xXMBV2kkOP5yKtjuFwIva-kjzQOwIr3aiYVeoOMWjcSFMJywDAu2qyeJgfZ2DR9QRAL2MhgL-0knwUc9mf8rJuKMDIkaKoZ0w',
                'farmerName' => 'Samuel Malinga',
                'farmerRole' => 'Lead Producer, Masaka Collective',
                'details' => [
                    ['label' => 'Altitude', 'value' => '1,950m'],
                    ['label' => 'Soil', 'value' => 'Rich Volcanic Ash'],
                    ['label' => 'Farm Size', 'value' => '4.2 Hectares'],
                    ['label' => 'Trees', 'value' => 'SL-14 & SL-28 Heritage'],
                ],
            ],
            'process' => [
                'eyebrow' => 'Process Architecture',
                'title' => 'Refining the Cherry',
                'details' => [
                    ['label' => 'Method', 'value' => 'Fully Washed'],
                    ['label' => 'Fermentation', 'value' => '24h Anaerobic'],
                    ['label' => 'Drying', 'value' => 'Raised African Beds'],
                    ['label' => 'Moisture Content', 'value' => '11.5%'],
                ],
                'sensoryProfile' => [
                    ['icon' => 'cookie', 'label' => 'Dark Chocolate', 'filled' => 4],
                    ['icon' => 'sunny', 'label' => 'Citric Acidity', 'filled' => 3],
                    ['icon' => 'local_florist', 'label' => 'Floral Lift', 'filled' => 4],
                ],
                'note' => 'Best enjoyed within 14 days of roasting to preserve the clearest fruit and floral notes.',
            ],
            'blockchain' => [
                'hash' => '0x7a2d4f8...b1e9c2d0f5',
                'description' => 'This batch is immutable. Its record from farmer payment to logistics clearance is preserved as part of the ledger-backed traceability flow.',
            ],
        ];
    }

    /**
     * Transform a stored traceability record into page props.
     */
    protected function fromModel(Traceability $traceability): array
    {
        return [
            'batch' => $traceability->batch,
            'issuer' => $traceability->issuer,
            'image' => $traceability->image,
            'badges' => $traceability->badges ?? [],
            'coffee' => [
                'variety' => $traceability->variety,
                'origin' => $traceability->origin,
                'score' => $traceability->score,
                'grade' => $traceability->grade,
            ],
            'impactCards' => $traceability->impact_cards ?? [],
            'journeySteps' => $traceability->journey_steps ?? [],
            'estate' => [
                'eyebrow' => $traceability->estate_eyebrow,
                'title' => $traceability->estate_title,
                'description' => $traceability->estate_description,
                'farmerImage' => $traceability->farmer_image,
                'farmerName' => $traceability->farmer_name,
                'farmerRole' => $traceability->farmer_role,
                'details' => $traceability->estate_details ?? [],
            ],
            'process' => [
                'eyebrow' => $traceability->process_eyebrow,
                'title' => $traceability->process_title,
                'details' => $traceability->process_details ?? [],
                'sensoryProfile' => $traceability->sensory_profile ?? [],
                'note' => $traceability->process_note,
            ],
            'blockchain' => [
                'hash' => $traceability->blockchain_hash,
                'description' => $traceability->blockchain_description,
            ],
        ];
    }

    /**
     * Flatten page props into database columns.
     */
    protected function flattenPassport(array $passport): array
    {
        return [
            'batch' => $passport['batch'],
            'issuer' => $passport['issuer'],
            'image' => $passport['image'],
            'variety' => $passport['coffee']['variety'],
            'origin' => $passport['coffee']['origin'],
            'score' => $passport['coffee']['score'],
            'grade' => $passport['coffee']['grade'],
            'badges' => $passport['badges'],
            'impact_cards' => $passport['impactCards'],
            'journey_steps' => $passport['journeySteps'],
            'estate_eyebrow' => $passport['estate']['eyebrow'],
            'estate_title' => $passport['estate']['title'],
            'estate_description' => $passport['estate']['description'],
            'farmer_image' => $passport['estate']['farmerImage'],
            'farmer_name' => $passport['estate']['farmerName'],
            'farmer_role' => $passport['estate']['farmerRole'],
            'estate_details' => $passport['estate']['details'],
            'process_eyebrow' => $passport['process']['eyebrow'],
            'process_title' => $passport['process']['title'],
            'process_details' => $passport['process']['details'],
            'sensory_profile' => $passport['process']['sensoryProfile'],
            'process_note' => $passport['process']['note'],
            'blockchain_hash' => $passport['blockchain']['hash'],
            'blockchain_description' => $passport['blockchain']['description'],
        ];
    }
}
