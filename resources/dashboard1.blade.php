<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .dashboard-card {
            transition: all 0.3s ease;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .sidebar-nav {
            transition: transform 0.3s ease;
        }
        @media (max-width: 1024px) {
            .sidebar-nav {
                transform: translateX(-100%);
            }
            .sidebar-nav.mobile-open {
                transform: translateX(0);
            }
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="h-full">
    <div class="flex h-full">
        <!-- Sidebar Navigation -->
        <nav id="sidebar" class="sidebar-nav w-64 bg-white border-r border-gray-200 flex flex-col fixed lg:static inset-y-0 left-0 z-20 transform lg:transform-none h-full">
            <!-- Logo -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 gradient-bg rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800">EduManage</span>
                </div>
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation Links -->
            <div class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-3 bg-blue-50 text-blue-600 rounded-lg font-medium">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('student.index') }}" class="flex items-center space-x-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Students</span>
                </a>
                <a href="{{ route('teacher.index') }}" class="flex items-center space-x-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <i class="fas fa-chalkboard-teacher w-5 text-center"></i>
                    <span>Teachers</span>
                </a>
                {{-- <a href="{{ route('classes.index') }}" class="flex items-center space-x-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <i class="fas fa-door-open w-5 text-center"></i>
                    <span>Classes</span>
                </a> --}}
                {{-- <a href="{{ route('students.fees', $data->id) }}" class="flex items-center space-x-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <i class="fas fa-money-bill-wave w-5 text-center"></i>
                    <span>Fees</span>
                </a> --}}
                {{-- <a href="{{ route('users.index') }}" class="flex items-center space-x-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-lg font-medium">
                    <i class="fas fa-user-cog w-5 text-center"></i>
                    <span>Users</span>
                </a> --}}
            </div>

            <!-- Sidebar Footer -->
            <div class="border-t border-gray-200 p-4">
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-question text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Need Help?</p>
                            <p class="text-xs text-gray-600">Check our documentation</p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile Overlay -->
        <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-10 lg:hidden" onclick="toggleMobileMenu()" style="display: none;"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden lg:ml-0">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Mobile menu button -->
                    <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                        <i class="fas fa-bars text-lg"></i>
                    </button>

                    <!-- Search Bar -->
                    <div class="flex-1 max-w-2xl mx-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search...">
                        </div>
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute top-0 right-0 block h-2 w-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- User Profile -->
                        <div class="relative">
                            <button onclick="toggleUserMenu()" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100">
                                <div class="w-8 h-8 gradient-bg rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <span class="hidden md:block text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                            </button>
                            
                            <!-- User Dropdown Menu -->
                            <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-20">
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i>Settings
                                </a>
                                <div class="border-t border-gray-200"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
                    <p class="text-gray-600">Welcome back, {{ Auth::user()->name }}! Here's what's happening today.</p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                    <!-- Students Card -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Students</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    @php
                                        $studentsCount = \App\Models\Student::count();
                                        echo $studentsCount;
                                    @endphp
                                </p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-lg">
                                <i class="fas fa-users text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>12% increase</span>
                        </div>
                        <a href="{{ route('student.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                            View all students
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Teachers Card -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Teachers</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    @php
                                        $teachersCount = \App\Models\Teacher::count();
                                        echo $teachersCount;
                                    @endphp
                                </p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-lg">
                                <i class="fas fa-chalkboard-teacher text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>5% increase</span>
                        </div>
                        <a href="{{ route('teacher.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-green-600 hover:text-green-800">
                            View all teachers
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Fees Card -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Fees</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">${{ number_format(12500, 2) }}</p>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-lg">
                                <i class="fas fa-money-bill-wave text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-red-600">
                            <i class="fas fa-arrow-down mr-1"></i>
                            <span>3% decrease</span>
                        </div>
                        {{-- <a href="{{ route('fees.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-yellow-600 hover:text-yellow-800">
                            View fee details
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a> --}}
                    </div>

                    <!-- Classes Card -->
                    {{-- <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Classes</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    @php
                                        $classesCount = \App\Models\SchoolClass::count();
                                        echo $classesCount;
                                    @endphp
                                </p>
                            </div>
                            <div class="p-3 bg-purple-100 rounded-lg">
                                <i class="fas fa-door-open text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>8% increase</span>
                        </div>
                        {{-- <a href="{{ route('classes.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-purple-600 hover:text-purple-800">
                            View all classes
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a> --}}
                    {{-- </div>  --}}

                    <!-- Users Card -->
                    {{-- <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">System Users</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">
                                    @php
                                        $usersCount = \App\Models\User::count();
                                        echo $usersCount;
                                    @endphp
                                </p>
                            </div>
                            <div class="p-3 bg-indigo-100 rounded-lg">
                                <i class="fas fa-user-cog text-indigo-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>2% increase</span>
                        </div>
                        {{-- <a href="{{ route('users.index') }}" class="mt-4 inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800">
                            Manage users
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a> --}}
                    {{-- </div> --}}

                    <!-- Attendance Card -->
                    {{-- <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Today's Attendance</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">94%</p>
                            </div>
                            <div class="p-3 bg-pink-100 rounded-lg">
                                <i class="fas fa-clipboard-check text-pink-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-green-600">
                            <i class="fas fa-arrow-up mr-1"></i>
                            <span>2% increase</span>
                        </div>
                        <a href="#" class="mt-4 inline-flex items-center text-sm font-medium text-pink-600 hover:text-pink-800">
                            View attendance
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div> --}}

                    <!-- Events Card -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Upcoming Events</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">5</p>
                            </div>
                            <div class="p-3 bg-orange-100 rounded-lg">
                                <i class="fas fa-calendar-alt text-orange-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-gray-600">
                            <i class="fas fa-circle text-orange-500 mr-1 text-xs"></i>
                            <span>2 events this week</span>
                        </div>
                        <a href="#" class="mt-4 inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-800">
                            View calendar
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Messages Card -->
                    <div class="dashboard-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">New Messages</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">12</p>
                            </div>
                            <div class="p-3 bg-teal-100 rounded-lg">
                                <i class="fas fa-envelope text-teal-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center text-sm text-red-600">
                            <i class="fas fa-circle text-red-500 mr-1 text-xs"></i>
                            <span>3 unread</span>
                        </div>
                        <a href="#" class="mt-4 inline-flex items-center text-sm font-medium text-teal-600 hover:text-teal-800">
                            Check messages
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Additional Cards Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Activity -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-semibold text-gray-900">Recent Activity</h2>
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
                        </div>
                        <div class="space-y-4">
                            @php
                                $recentActivities = [
                                    ['icon' => 'user-plus', 'color' => 'blue', 'description' => 'New student registered - John Doe', 'time' => '5 minutes ago'],
                                    ['icon' => 'money-bill-wave', 'color' => 'green', 'description' => 'Fee payment received - $500', 'time' => '1 hour ago'],
                                    ['icon' => 'door-open', 'color' => 'purple', 'description' => 'New class created - Science 10A', 'time' => '2 hours ago'],
                                    ['icon' => 'chalkboard-teacher', 'color' => 'orange', 'description' => 'Teacher assignment updated', 'time' => '1 day ago'],
                                    ['icon' => 'exclamation-triangle', 'color' => 'red', 'description' => 'Attendance alert - Low attendance in Class 8B', 'time' => '2 days ago'],
                                ];
                            @endphp
                            
                            @foreach($recentActivities as $activity)
                            <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                <div class="w-10 h-10 bg-{{ $activity['color'] }}-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-{{ $activity['icon'] }} text-{{ $activity['color'] }}-600 text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $activity['description'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $activity['time'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('student.create') }}" class="p-4 border border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-colors text-center group">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Add Student</p>
                            </a>
                            <a href="{{ route('teacher.create') }}" class="p-4 border border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition-colors text-center group">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-green-200 transition-colors">
                                    <i class="fas fa-chalkboard-teacher text-green-600 text-xl"></i>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Add Teacher</p>
                            </a>
                            {{-- <a href="{{ route('fees.create') }}" class="p-4 border border-gray-200 rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition-colors text-center group">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-yellow-200 transition-colors">
                                    <i class="fas fa-money-bill-wave text-yellow-600 text-xl"></i>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Record Fee</p>
                            </a>
                            <a href="{{ route('classes.create') }}" class="p-4 border border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-colors text-center group">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-purple-200 transition-colors">
                                    <i class="fas fa-door-open text-purple-600 text-xl"></i>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Create Class</p>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');
            sidebar.classList.toggle('mobile-open');
            overlay.style.display = sidebar.classList.contains('mobile-open') ? 'block' : 'none';
        }
        
        function toggleUserMenu() {
            const userMenu = document.getElementById('user-menu');
            userMenu.classList.toggle('hidden');
        }
        
        // Close menus when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileMenuBtn = document.querySelector('[onclick="toggleMobileMenu()"]');
            const userMenu = document.getElementById('user-menu');
            const userMenuBtn = document.querySelector('[onclick="toggleUserMenu()"]');
            
            // Close mobile menu
            if (window.innerWidth <= 1024 && 
                sidebar && 
                mobileMenuBtn && 
                !sidebar.contains(event.target) && 
                !mobileMenuBtn.contains(event.target)) {
                sidebar.classList.remove('mobile-open');
                document.getElementById('mobile-overlay').style.display = 'none';
            }
            
            // Close user menu
            if (userMenu && 
                userMenuBtn && 
                !userMenu.contains(event.target) && 
                !userMenuBtn.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>