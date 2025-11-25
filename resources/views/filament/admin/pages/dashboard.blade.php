@extends('filament::layouts.base')

@section('content')
<div class="filament-page-heading">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p class="text-sm text-muted-foreground">Overview and quick links.</p>
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="text-sm text-gray-500">Total Applicants</div>
            <div class="mt-2 text-2xl font-semibold">{{ \App\Models\CalonPeserta::count() }}</div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="text-sm text-gray-500">Total Participants</div>
            <div class="mt-2 text-2xl font-semibold">{{ \App\Models\Peserta::count() }}</div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <div class="text-sm text-gray-500">Total Postings</div>
            <div class="mt-2 text-2xl font-semibold">{{ \App\Models\PostinganMagang::count() }}</div>
        </div>
    </div>
</div>

<div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-medium">Recent Applicants</h2>
            <a href="{{ url('admin/resources/calon-pesertas') }}" class="text-sm text-primary-600">View all</a>
        </div>

        @php
            $recentApplicants = \App\Models\CalonPeserta::orderBy('created_at','desc')->limit(5)->get();
        @endphp

        <div class="mt-4 overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-xs text-gray-500 uppercase">
                        <th class="px-3 py-2">Name</th>
                        <th class="px-3 py-2">University</th>
                        <th class="px-3 py-2">Specialization</th>
                        <th class="px-3 py-2">Applied</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentApplicants as $applicant)
                        <tr class="border-t">
                            <td class="px-3 py-2">{{ $applicant->nama_lengkap }}</td>
                            <td class="px-3 py-2">{{ $applicant->asal_universitas }}</td>
                            <td class="px-3 py-2">{{ optional($applicant->spesialisasi)->nama_spesialisasi ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $applicant->created_at ? $applicant->created_at->format('Y-m-d') : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-3 py-2" colspan="4">No recent applicants.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-medium">Recent Evaluations</h2>
            <a href="{{ url('admin/resources/penilaian-magang') }}" class="text-sm text-primary-600">View all</a>
        </div>

        @php
            $recentEvaluations = \App\Models\PenilaianMagang::orderBy('created_at','desc')->limit(5)->get();
        @endphp

        <div class="mt-4 overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-xs text-gray-500 uppercase">
                        <th class="px-3 py-2">Participant</th>
                        <th class="px-3 py-2">Score</th>
                        <th class="px-3 py-2">Notes</th>
                        <th class="px-3 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentEvaluations as $eval)
                        <tr class="border-t">
                            <td class="px-3 py-2">{{ $eval->nama }}</td>
                            <td class="px-3 py-2">{{ $eval->nilai_rata_rata }}</td>
                            <td class="px-3 py-2">{{ Str::limit($eval->masukan ?? '-', 60) }}</td>
                            <td class="px-3 py-2">{{ $eval->created_at ? $eval->created_at->format('Y-m-d') : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-3 py-2" colspan="4">No recent evaluations.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
