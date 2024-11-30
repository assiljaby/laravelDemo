<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
        <li class="hover:underline text-blue-500"><a href="/job/{{$job['id']}}"><strong class="bold">{{$job['title']}}:</strong> Pays {{$job['salary']}}</a></li>
        @endforeach
    </ul>

</x-layout>
