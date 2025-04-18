<x-layout>

    <div class="container mx-auto p-5 relative ">
        <main class="relative container mx-auto rounded-2xl overflow-hidden p-5 bg-cover bg-center h-[500px]" style="background-image: url('/storage/images/tentang-kami.jpg')">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute inset-0 text-white font-bold hover:bg-black/10">
                <div class="flex justify-center items-center flex-col h-full container mx-auto p-5 space-y-5">
                    <h1 class="text-4xl text-white">PT. GAMANA KRIDA BHAKTI</h1>
                    <p class="max-w-2xl text-center text-gray-300">
                        LSBU Gamana Krida Bhakti adalah lembaga sertifikasi resmi untuk Badan Usaha Jasa Konstruksi yang mengelola proses sertifikasi secara digital melalui portal LSBU.id.
                        Mendukung usaha konstruksi nasional dengan layanan terpercaya, transparan, dan terintegrasi dengan sistem OSS pemerintah.   
                        {{-- @if (Auth::check())
                        <h1 class="text-green">
                            kamu adalah user {{ Auth::user()->name }} </h1>
                        @else
                        <h1 class="text-red">
                            kamu bukan user</h1>                            
                        @endif --}}
                    </p>
                </div>
            </div>
        </main>
    </div>
</x-layout>
