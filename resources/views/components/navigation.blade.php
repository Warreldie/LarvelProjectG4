<nav class="bg-gray font-headers text-base text-xl z-20">
        <div class="max-w-8xl mx-auto h-20 pt-2 shadow-md bg-white">
            <div class="flex justify-between pr-20 pl-20 items-center">
                <div class="flex space-x-32 items-center">
                    <!-- logo -->
                    <div class="flex items-center">
                        <a href="{{url('/login')}}"> <img  class="w-14 h-14" src="{{ asset('./../images/logo.png') }}" alt="logo"> </a>
                        <span>Sea hackers</span>
                    </div>
                    <!-- search -->
                    <div class="border-2 border-mainblue rounded pl-5 pr-5 pt-1 filter shadow-md">
                    <input type="text"  class="outline-none" placeholder="Search..." size="40">
                    <button type="submit" class="">
                        <img class="w-4" src="{{ asset('./../images/search.png') }}" alt="search">
                    </button>
                    </div>
                </div>
                    <!-- navigation -->
                    <div class="flex space-x-5">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('/collections')}}">Collections</a>
                        <a href="{{url('/nfts')}}">NFTS</a>
                        <a href="{{url('/market')}}">Market</a>
                        @if(Auth::check())
                        <div id="dropdown">
                        <a href=""> <img class="h-6" id="dropdown-nav" src="{{ asset('./../images/profile.png') }}" alt="profile"></a>

                        <!-- dropdown items -->
                        <div class="hidden z-10 absolute items-center bg-white px-2" id="dropdownlist">
                        <a class="block pt-2" href="{{url('/profile/{$id}')}}"> My profile</a>
                        <a class="block pt-2" href=""> My collections</a>
                        <a class="block pt-2" href="{{url('/logout')}}"> Logout</a>
  
                        </div>

                        </div>
                        
                        @else
                        <a href="{{url('/login')}}">login/register</a>
                        @endif
                        
                    </div>


            </div>
        </div>

    </nav>