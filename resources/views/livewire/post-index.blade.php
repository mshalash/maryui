<div>
<livewire:navigation />
    <x-header title="Posts" subtitle="Latest posts">
        <x-slot:middle class="!justify-end">
            <x-input icon="o-bolt" placeholder="Search..." />
        </x-slot:middle>
        <x-slot:actions>
            <x-button @click="$wire.drawer = true" responsive icon="o-funnel" />

        </x-slot:actions>

    </x-header>

    <x-table :headers="$headers" :rows="$posts" striped class="bg-white">
        @scope('header_title', $header)
        <h2 class="text-xl font-bold text-black">
            {{ $header['label'] }}
        </h2>
        @endscope
        @scope('header_slug', $header)
        <h2 class="text-xl font-bold text-black">
            {{ $header['label'] }}
        </h2>

        @endscope

        @scope('cell_edit', $post)
        <x-button icon="o-pencil-square" wire:click="edit( {{ $post->id }})" spinner class="btn-sm btn-success" />
        @endscope

        @scope('cell_delete', $post)
        <x-button icon="o-trash" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure?" spinner
            class="btn-sm btn-error" />
        @endscope
    </x-table>

    {{-- Post Modal --}}
    <x-modal wire:model="postModal" class="backdrop-blur">
        <x-form wire:submit="save">
            <x-input label="Title" wire:model="form.title" inline />
            <x-input label="Slug" wire:model="form.slug" inline />
            <x-textarea label="Content" wire:model="form.content" placeholder="Your story..." hint="Max 1000 chars"
                rows="3" inline />
            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.closeModal()" />
                <x-button label="Save" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass"
            @keydown.enter="$wire.drawer = false" />

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer>
</div>