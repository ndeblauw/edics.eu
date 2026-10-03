<?php

use App\Models\Edic;

it('syncs the current EDICs including EUCAIM, MoLo and TEF-Health', function () {
    $this->artisan('edics:update')->assertSuccessful();

    expect(Edic::where('status', 'established')->count())->toBe(7)
        ->and(Edic::where('status', 'preparing')->count())->toBe(6);

    $this->assertDatabaseHas('edics', ['slug' => 'cancer-image', 'acronym' => 'EUCAIM']);
    $this->assertDatabaseHas('edics', ['slug' => 'mobility', 'acronym' => 'MoLo']);
    $this->assertDatabaseHas('edics', ['slug' => 'tef-health', 'acronym' => 'TEF-Health']);
});

it('does not restore a previously deleted EDIC', function () {
    Edic::factory()->create([
        'slug' => 'alt-edic',
        'acronym' => 'ALT-EDIC',
        'description' => 'Old record that should stay deleted.',
    ])->delete();

    $this->artisan('edics:update')->assertSuccessful();

    expect(Edic::where('slug', 'alt-edic')->exists())->toBeFalse()
        ->and(Edic::withTrashed()->where('slug', 'alt-edic')->first()->trashed())->toBeTrue();
});
