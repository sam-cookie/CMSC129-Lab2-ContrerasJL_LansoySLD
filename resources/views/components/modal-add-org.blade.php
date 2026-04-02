
<!-- backdrop -->
<div id="addOrgModal"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">

    <!-- modal box -->
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4 p-7 relative">

        <!-- close button -->
        <button onclick="closeAddOrgModal()"
                class="absolute top-4 right-5 text-gray-500 text-xl font-bold leading-none">
            ✕
        </button>

        <form method="POST" action="{{ route('orgs.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-x-8 gap-y-5">

                <div class="flex flex-col gap-4">

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Name of the org?
                        </label>
                        <input
                            type="text"
                            name="name"
                            placeholder="Type name here..."
                            class="w-full border-2 border-upv-green rounded-xl px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400 outline-none font-body"
                        >
                    </div>

                    <!-- Description -->
                    <div class="flex flex-col flex-1">
                        <label class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Describe the org
                        </label>
                        <textarea
                            name="description"
                            placeholder="Type description here..."
                            rows="6"
                            class="w-full border-2 border-upv-green rounded-xl px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400 outline-none resize-none font-body flex-1"
                        ></textarea>
                    </div>

                   <!-- photo upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Add photo of org...
                        </label>
                        <label class="flex items-center justify-center w-full border-2 border-upv-green rounded-xl py-4 cursor-pointer bg-white">
                            <svg class="w-7 h-7 fill-gray-400" viewBox="0 0 24 24">
                                <path d="M21 19V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2zM8.5 13.5l2.5 3 3.5-4.5 4.5 6H5l3.5-4.5z"/>
                            </svg>
                            <input type="file" name="photo" accept="image/*" class="hidden">
                        </label>
                    </div>

                </div>

                <div class="flex flex-col gap-4">

                    <!-- Active / Inactive -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Active or Inactive?
                        </label>
                        <div class="flex items-center gap-5">
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="status" value="active" checked
                                       class="accent-upv-green w-4 h-4">
                                <span class="text-sm text-gray-700">active</span>
                            </label>
                            <label class="flex items-center gap-1.5 cursor-pointer">
                                <input type="radio" name="status" value="inactive"
                                       class="accent-upv-green w-4 h-4">
                                <span class="text-sm text-upv-maroon font-medium">inactive</span>
                            </label>
                        </div>
                    </div>

                    <!-- Type -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Type of org?
                        </label>
                        <div class="relative">
                            <!-- monitor icon inside select -->
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24">
                                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                                    <path d="M8 21h8M12 17v4"/>
                                </svg>
                            </span>
                            <select name="type"
                                    class="w-full border-2 border-upv-green rounded-xl pl-9 pr-4 py-2.5 text-sm text-gray-700 outline-none appearance-none bg-white font-body">
                                <option value="academic">Academic</option>
                                <option value="sports">Sports</option>
                                <option value="performer">Arts & Performance</option>
                                <option value="political">Political</option>
                                <option value="culture_identity">Culture & Identity</option>
                                <option value="media">Media & Publicayion</option>
                                <option value="special_interest">Special Interest</option>
                                <option value="other">Other</option>

                            </select>
                            <!-- chevron -->
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-4 h-4 stroke-gray-500" fill="none" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Number of members -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Number of members?
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                </svg>
                            </span>
                            <input
                                type="number"
                                name="members"
                                placeholder="Type no. here..."
                                class="w-full border-2 border-upv-green rounded-xl pl-9 pr-4 py-2.5 text-sm text-gray-700 placeholder-gray-400 outline-none font-body"
                            >
                        </div>
                    </div>

                    <!-- email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800 mb-1.5">
                            Email?
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                            </span>
                            <input
                                type="email"
                                name="email"
                                placeholder="Type email here..."
                                class="w-full border-2 border-upv-green rounded-xl pl-9 pr-4 py-2.5 text-sm text-gray-700 placeholder-gray-400 outline-none font-body"
                            >
                        </div>
                    </div>

                </div>

            </div>

           <!-- submit org -->
            <button type="submit"
                    class="w-full mt-6 bg-upv-green text-white font-head font-bold text-base py-3 rounded-xl">
                add new org
            </button>

        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('addOrgModal').addEventListener('click', function(e) {
            if (e.target === this) closeAddOrgModal();
        });
    });
</script>