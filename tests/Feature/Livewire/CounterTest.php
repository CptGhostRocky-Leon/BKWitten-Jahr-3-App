<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Counter;
use Livewire\Livewire;
use Tests\TestCase;

class CounterTest extends TestCase
{
    public function test_renders_successfully(): void
    {
        Livewire::test(Counter::class)
            ->assertStatus(200)
            ->assertSee('Schulprojekt Livewire Test')
            ->assertSee('0');
    }

    public function test_can_increment(): void
    {
        Livewire::test(Counter::class)
            ->call('increment')
            ->assertSee('1');
    }

    public function test_can_decrement(): void
    {
        Livewire::test(Counter::class)
            ->set('count', 3)
            ->call('decrement')
            ->assertSee('2');
    }

    public function test_cannot_decrement_below_zero(): void
    {
        Livewire::test(Counter::class)
            ->set('count', 0)
            ->call('decrement')
            ->assertSee('0');
    }

    public function test_can_reset_count(): void
    {
        Livewire::test(Counter::class)
            ->set('count', 5)
            ->call('resetCount')
            ->assertSee('0');
    }
}
