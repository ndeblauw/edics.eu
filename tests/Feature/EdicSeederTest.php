<?php

use App\Models\Edic;
use Database\Seeders\EdicSeeder;

it('seeds the current EDICs without stale records', function () {
    $this->seed(EdicSeeder::class);

    expect(Edic::withTrashed()->count())->toBe(13)
        ->and(Edic::onlyTrashed()->count())->toBe(0);

    $this->assertDatabaseHas('edics', ['slug' => 'tef-health', 'acronym' => 'TEF-Health']);
});
