@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <a href="{{ route('users.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-4 transition">
                    <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Users
                </a>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">User Profile</h1>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('users.edit', $user) }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Edit Profile
                </a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                        Delete User
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profile Card -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden text-center p-8">
                    <div class="mb-6">
                        <div class="h-24 w-24 mx-auto rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-4xl font-bold shadow-xl shadow-blue-100">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">{{ $user->name }}</h2>
                    <p class="text-sm text-gray-500 mt-1 font-medium">{{ $user->email }}</p>
                    
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex items-center justify-between text-sm text-gray-500 py-1">
                            <span>Status</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-500 py-1">
                            <span>Joined</span>
                            <span>{{ $user->created_at->format('M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="md:col-span-2 space-y-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Personal Information
                    </h3>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider">Full Name</dt>
                            <dd class="mt-1 text-base text-gray-900 font-semibold">{{ $user->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider">Email Address</dt>
                            <dd class="mt-1 text-base text-gray-900 font-semibold underline decoration-blue-200 underline-offset-4">{{ $user->email }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider">Member Since</dt>
                            <dd class="mt-1 text-base text-gray-900 font-semibold">{{ $user->created_at->format('F d, Y \a\t H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 uppercase tracking-wider">Last Login</dt>
                            <dd class="mt-1 text-base text-gray-900 font-semibold italic text-gray-400">Never</dd>
                        </div>
                    </dl>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Security & Accountability
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="flex-shrink-0 h-10 w-10 bg-white rounded-lg flex items-center justify-center border border-gray-200 text-gray-400 shadow-sm">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800 uppercase tracking-tight">Audit Log Access</p>
                                <p class="text-xs text-gray-500">Record of all actions taken by this user.</p>
                            </div>
                            <div class="ml-auto">
                                <button class="text-blue-600 hover:text-blue-700 font-semibold text-sm transition font-sans">View Logs</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
