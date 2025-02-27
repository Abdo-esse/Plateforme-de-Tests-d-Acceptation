 <!-- Navbar -->
 <nav class="fixed top-0 w-full bg-white shadow-md z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="text-xl font-bold">
                    <span class="text-blue-600">Test</span><span class="text-gray-800">Accept</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-blue-600 border border-blue-600 rounded-md hover:bg-blue-50 transition-colors">
                            Logout
                        </button>
                    </form>
                <a href="{{ route('startTest') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition-colors">
                    Get Started Test
                </a>
            </div>
        </div>
    </div>
</nav>