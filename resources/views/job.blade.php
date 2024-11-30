<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <h2 class="font-bold">{{$job->title}}</h2><br>

    <p>
        This job pays {{$job->salary}} a year.
    </p>
</x-layout>
