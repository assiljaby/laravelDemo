<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <h2 class="font-bold">{{$job->title}}</h2><br>

    <p>
        This job pays {{$job->salary}} a year.
    </p>
    @can('edit')
    <div class="mt-8">
        <x-button href="/job/{{ $job->id }}/edit">Edit Job</x-button>
    </div>
    @endcan
</x-layout>
