<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@nnamdinwagwu.com'],
            [
                'name' => 'Nnamdi I. Nwagwu, Esq.',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        if (Article::count() === 0) {
            Article::create([
                'user_id' => $admin->id,
                'title' => 'Navigating Incorporated Trustees & NGO Registration in Nigeria',
                'slug' => 'navigating-incorporated-trustees-ngo-registration-nigeria',
                'excerpt' => 'A comprehensive guide on legal requirements, CAC documentation, and regulatory compliance for non-governmental organisations and charitable foundations in Nigeria.',
                'content' => '
                    <p>Non-governmental organisations (NGOs), civil society organisations (CSOs), and international development partners operating within Nigeria are required to establish legal personality under Part F of the Companies and Allied Matters Act (CAMA) 2020 through the registration of Incorporated Trustees.</p>
                    
                    <h3>1. Constitutional & Governance Documentation</h3>
                    <p>The foundation of any sustainable NGO is its constitution. Under Nigerian law, the constitution must outline the aims and objectives of the organisation, the qualifications and powers of trustees, rules governing meetings, and procedures for dissolution.</p>
                    
                    <h3>2. CAC Registration Requirements</h3>
                    <p>Registration with the Corporate Affairs Commission (CAC) requires:</p>
                    <ul>
                        <li>Approved Name Availability search.</li>
                        <li>Publication of notices in two national daily newspapers.</li>
                        <li>Sworn declaration of trustees and passport photography.</li>
                        <li>Minutes of the meeting appointing trustees and adopting the constitution.</li>
                    </ul>

                    <h3>3. Post-Registration & Tax Exemptions</h3>
                    <p>Once registered, NGOs must comply with annual returns filings at CAC, Anti-Money Laundering (SCUML) registration, and Tax Exemption filings under Section 23 of the Companies Income Tax Act (CITA).</p>
                    
                    <p>For dedicated legal advisory on NGO structuring and compliance, feel free to contact our chambers directly.</p>
                ',
                'image_path' => '/images/law_img_3.jpg',
                'status' => 'published',
                'published_at' => now(),
            ]);
        }
    }
}
