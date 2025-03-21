@extends('layouts.guest')
@section('title', 'Yappr - Social Content Platform')

@section('header')
    <x-header />
@endsection

@section('content')
    <div class="w-full flex flex-col items-center justify-center space-y-12">
        <!-- Hero Header -->
        <div class="text-center space-y-6 max-w-4xl">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900">
                Share Your Thoughts. Connect. Engage.
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto">
                The social platform where your content matters. Create posts, follow friends, and join conversations in
                a whole new way.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                <a href="/register"
                    class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200">
                    Join Yappr
                </a>
                <a href="/explore"
                    class="px-8 py-3 bg-white hover:bg-gray-50 text-indigo-600 font-medium rounded-lg border border-gray-200 transition-colors duration-200">
                    Explore Feed
                </a>
            </div>
        </div>

        <!-- App Preview -->
        <div class="relative w-full max-w-5xl mt-8">
            <div
                class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl transform rotate-1 opacity-10">
            </div>
            <div class="relative bg-white p-6 rounded-xl shadow-xl overflow-hidden">
                <img src="https://placehold.co/1200x600" alt="Yappr Feed Interface"
                    class="rounded-lg w-full object-cover" />
            </div>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-5xl mt-16">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i class="ti ti-edit text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Engaging Posts</h3>
                <p class="text-gray-600">Create and share content that expresses your true thoughts and personality.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i class="ti ti-users text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Community</h3>
                <p class="text-gray-600">Follow friends, join groups, and build your network of connections.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i class="ti ti-trending-up text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Discover</h3>
                <p class="text-gray-600">Find trending content and creators through personalized recommendations.</p>
            </div>
        </div>

        <!-- Feed Preview -->
        <div class="w-full max-w-5xl mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">Your Feed, Your Story</h2>

            <div class="space-y-4">
                <!-- Example Post 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                            <i class="ti ti-user text-indigo-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Alex Morgan</p>
                            <p class="text-xs text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <h4 class="font-medium mb-2">Thoughts on the latest tech trends</h4>
                    <p class="text-gray-700 mb-3">Just attended an amazing tech conference where the future of AI was
                        discussed. The potential applications in healthcare are mind-blowing! What do you think about the
                        ethical implications?</p>
                    <div class="bg-gray-50 rounded-lg p-3 mb-3">
                        <img src="https://placehold.co/600x300" alt="Tech Conference" class="rounded w-full object-cover" />
                    </div>
                    <div class="flex items-center space-x-4 mt-3 text-gray-500">
                        <button class="flex items-center space-x-1">
                            <i class="ti ti-heart"></i>
                            <span>124</span>
                        </button>
                        <button class="flex items-center space-x-1">
                            <i class="ti ti-message-circle"></i>
                            <span>18</span>
                        </button>
                        <button class="flex items-center space-x-1">
                            <i class="ti ti-share"></i>
                            <span>8</span>
                        </button>
                    </div>
                </div>

                <!-- Example Post 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="ti ti-user text-purple-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Jamie Chen</p>
                            <p class="text-xs text-gray-500">Yesterday</p>
                        </div>
                    </div>
                    <h4 class="font-medium mb-2">My reaction to the season finale!</h4>
                    <p class="text-gray-700 mb-3">I can't believe what just happened in the season finale of Dragon's
                        Throne! That plot twist with the queen was absolutely incredible. No spoilers, but who else is
                        excited for next season?</p>
                    <div class="flex items-center space-x-4 mt-3 text-gray-500">
                        <button class="flex items-center space-x-1">
                            <i class="ti ti-heart text-red-500"></i>
                            <span>342</span>
                        </button>
                        <button class="flex items-center space-x-1">
                            <i class="ti ti-message-circle"></i>
                            <span>87</span>
                        </button>
                        <button class="flex items-center space-x-1">
                            <i class="ti ti-share"></i>
                            <span>46</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-6">
                <a href="/explore" class="text-indigo-600 font-medium flex items-center justify-center">
                    See more in the feed
                    <i class="ti ti-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Features Grid -->
        <div class="w-full max-w-5xl mt-16">
            <h2 class="text-3xl font-bold text-center mb-12">Everything You Need to Connect</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-writing text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Rich Content</h3>
                    <p class="text-sm text-gray-500">Share thoughts and media</p>
                </div>

                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-message text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Comments</h3>
                    <p class="text-sm text-gray-500">Respond to friends naturally</p>
                </div>

                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-hash text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Topics</h3>
                    <p class="text-sm text-gray-500">Find conversations you care about</p>
                </div>

                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-bell text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Alerts</h3>
                    <p class="text-sm text-gray-500">Stay engaged with notifications</p>
                </div>

                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-user-circle text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Profiles</h3>
                    <p class="text-sm text-gray-500">Showcase your identity</p>
                </div>

                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-eye text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Privacy Controls</h3>
                    <p class="text-sm text-gray-500">Public or private posts</p>
                </div>

                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-chart-line text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Analytics</h3>
                    <p class="text-sm text-gray-500">Track your growth and reach</p>
                </div>

                <div class="flex flex-col items-center text-center p-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-3">
                        <i class="ti ti-calendar text-indigo-600"></i>
                    </div>
                    <h3 class="font-medium mb-1">Scheduling</h3>
                    <p class="text-sm text-gray-500">Plan your content ahead</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div
            class="w-full max-w-5xl bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl p-12 text-white text-center mt-16">
            <h2 class="text-3xl font-bold mb-4">Join the Conversation</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Connect with friends and meet new people through the power of shared
                content.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register"
                    class="px-8 py-3 bg-white text-indigo-600 font-medium rounded-lg hover:bg-gray-100 transition-colors duration-200 flex items-center justify-center">
                    <i class="ti ti-user-plus mr-2"></i>
                    Create Account
                </a>
                <a href="/login"
                    class="px-8 py-3 bg-transparent border border-white text-white font-medium rounded-lg hover:bg-white/10 transition-colors duration-200 flex items-center justify-center">
                    <i class="ti ti-login mr-2"></i>
                    Sign In
                </a>
            </div>
        </div>

        <!-- Download App Section -->
        <div class="w-full max-w-5xl flex flex-col md:flex-row items-center gap-8 mt-16">
            <div class="w-full md:w-1/2 space-y-6">
                <h2 class="text-3xl font-bold">Take Yappr Everywhere</h2>
                <p class="text-xl text-gray-600">Download our mobile app to stay connected with your network on the go.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#"
                        class="flex items-center justify-center bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors duration-200">
                        <i class="ti ti-brand-apple mr-2 text-xl"></i>
                        App Store
                    </a>
                    <a href="#"
                        class="flex items-center justify-center bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors duration-200">
                        <i class="ti ti-brand-google-play mr-2 text-xl"></i>
                        Google Play
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-indigo-500 to-purple-600 rounded-xl transform rotate-3 opacity-10">
                    </div>
                    <div class="relative">
                        <img src="https://placehold.co/500x600" alt="Yappr Mobile App"
                            class="rounded-xl w-full object-cover shadow-lg" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Community Section -->
        <div class="w-full max-w-5xl mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">Join Our Growing Community</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center mb-4">
                        <i class="ti ti-users text-indigo-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-semibold">Connect with Others</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Find friends, colleagues, and interesting creators to follow. Build your
                        network and engage with others who share your interests.</p>
                    <div class="flex -space-x-2 overflow-hidden">
                        <div
                            class="w-8 h-8 rounded-full bg-indigo-100 border-2 border-white flex items-center justify-center">
                            <i class="ti ti-user text-indigo-600 text-xs"></i>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-purple-100 border-2 border-white flex items-center justify-center">
                            <i class="ti ti-user text-purple-600 text-xs"></i>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-pink-100 border-2 border-white flex items-center justify-center">
                            <i class="ti ti-user text-pink-600 text-xs"></i>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-blue-100 border-2 border-white flex items-center justify-center">
                            <i class="ti ti-user text-blue-600 text-xs"></i>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-green-100 border-2 border-white flex items-center justify-center">
                            <i class="ti ti-user text-green-600 text-xs"></i>
                        </div>
                        <div
                            class="w-8 h-8 rounded-full bg-gray-100 border-2 border-white flex items-center justify-center text-xs font-medium">
                            +2K
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center mb-4">
                        <i class="ti ti-edit text-indigo-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-semibold">Share Your Perspective</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Express yourself through engaging content. Add context, emotion, and
                        media to your posts to stand out.</p>
                    <div class="flex items-center justify-center flex-wrap gap-2 text-sm font-medium sm:justify-baseline">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full">#technology</span>
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full">#entertainment</span>
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full">#lifestyle</span>
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full">+100 more</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="w-full max-w-5xl mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">What Our Users Say</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                            <i class="ti ti-user text-indigo-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Taylor K.</p>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Yappr lets me stay connected with my friends abroad. The private post
                        feature is perfect for sharing moments with just my close circle!"</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="ti ti-user text-purple-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Chris M.</p>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"As a content creator, Yappr has given me a new way to connect with my
                        audience. The engagement is incredible!"</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                            <i class="ti ti-user text-pink-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Jordan L.</p>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                                <i class="ti ti-star-filled"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"I love how Yappr makes social media feel more authentic again. The
                        scheduling feature helps me maintain a consistent presence."</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="w-full max-w-5xl mt-16">
            <h2 class="text-3xl font-bold text-center mb-8">Frequently Asked Questions</h2>

            <div class="space-y-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-lg">What type of content can I post?</h3>
                        <i class="ti ti-plus text-indigo-600"></i>
                    </div>
                    <p class="text-gray-600 mt-2">You can create text posts with rich formatting, add images, and share
                        links. Our platform supports various content types to help you express yourself.</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-lg">Is Yappr available worldwide?</h3>
                        <i class="ti ti-plus text-indigo-600"></i>
                    </div>
                    <p class="text-gray-600 mt-2">Yes! Yappr is available globally with support for multiple languages.</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-lg">Can I make my posts private?</h3>
                        <i class="ti ti-plus text-indigo-600"></i>
                    </div>
                    <p class="text-gray-600 mt-2">Absolutely. You can set individual posts to private so only approved
                        followers can see them.</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-lg">What is the post scheduling feature?</h3>
                        <i class="ti ti-plus text-indigo-600"></i>
                    </div>
                    <p class="text-gray-600 mt-2">The scheduling feature allows you to create posts and set them to publish
                        at a future date and time, helping you maintain a consistent presence.</p>
                </div>
            </div>
        </div>

        <!-- Final CTA -->
        <div
            class="w-full max-w-5xl bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl p-12 text-white text-center mt-16">
            <h2 class="text-3xl font-bold mb-4">Ready to Join the Conversation?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Create your account today and start sharing your content with the
                world.</p>
            <a href="/register"
                class="px-8 py-3 bg-white text-indigo-600 font-medium rounded-lg hover:bg-gray-100 transition-colors duration-200 inline-flex items-center">
                <i class="ti ti-user-plus mr-2"></i>
                Get Started for Free
            </a>
        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
