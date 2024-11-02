@php

    $DayStartPeriod = Carbon\Carbon::now();
    $DayEndPeriod = Carbon\Carbon::now()->addDays(9);
    $DayPeriod = Carbon\CarbonPeriod::create($DayStartPeriod, '1 day', $DayEndPeriod);

    $hourStartPeriod = Carbon\Carbon::now()->setTime(7, 0);

    if (Carbon\Carbon::now()->lt($hourStartPeriod)) {
        $currentWorkingTime = $hourStartPeriod;
    } else {
        $currentWorkingTime = Carbon\Carbon::now();
    }

    $hourEndPeriod = Carbon\Carbon::now()->endOfDay();

    $hourPeriod = Carbon\CarbonPeriod::create($currentWorkingTime, '1 hour', $hourEndPeriod);

    // dd($hourPeriod)

@endphp

<section class="section__tv">
    <h3>Date & Time</h3>
    <p>Pick a date and time for your appointment, and we'll be there.</p>
    <div class="section_day">
        @foreach ($DayPeriod as $day)
            <button :class="{ 'activeBtn': formData.date === '{{ $day->format('l, F d') }}' }"
                @click="formData.date = '{{ $day->format('l, F d') }}'; selectedDate = '{{ $day->format('Y-m-d') }}';updateAvailableTimes()">{{ $day->format('F d') }}</button>
        @endforeach
        <!-- Add more dates as needed -->
    </div>
    {{-- <div class="section_time">
        @foreach ($hourPeriod as $hour)
            <button :class="{ 'activeBtn': formData.time.includes('{{ $hour->format('g:00 a') }}') }"
                @click="toggleTime('{{ $hour->format('g:00 a') }}')">{{ $hour->format('g:00 A') }}</button>
        @endforeach
    </div> --}}
    <div class="section_time">
        <template x-for="time in availableTimes" :key="time">
            <button :class="{ 'activeBtn': formData.time.includes(time) }" @click="toggleTime(time)"
                x-text="time"></button>
        </template>
    </div>

</section>
