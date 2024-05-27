<div>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url(https://images.unsplash.com/photo-1495195134817-aeb325a55b65?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29va2luZyUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D);">
      <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
      <div class="sm:max-w-lg w-full p-10 bg-white rounded-xl z-10">
        <div class="text-center">
          <h2 class="mt-5 text-3xl font-bold text-gray-900">Upload Video</h2>
          <p class="mt-2 text-sm text-gray-400">Upload a video tutorial</p>
        </div>
        <form class="mt-8 space-y-3" wire:submit.prevent="save" method="POST">
          <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Title</label>
            <input wire:model="title" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="Enter title">
            @error('title') <span class="error text-red-300">{{ $message }}</span> @enderror
          </div>
          <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Video</label>
            <input wire:model="video" accept="video/mp4,video/x-m4v,video/*" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="file" placeholder="Enter title">
            @error('video') <span class="error text-red-300">{{ $message }}</span> @enderror
          </div>
          <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Thumbnail</label>
            <input wire:model="thumbnail" class="text-base p-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="file" accept="image/png, image/gif, image/jpeg" placeholder="Enter title">
            @error('thumbnail') <span class="error text-red-300">{{ $message }}</span> @enderror
          </div>
          <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Description</label>
            <textarea wire:model="description" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="file" placeholder="Enter Description"></textarea>
            @error('description') <span class="error text-red-300">{{ $message }}</span> @enderror
          </div>
          <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Price</label>
            <input wire:model="price" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="Price">
            @error('price') <span class="error text-red-300">{{ $message }}</span> @enderror
          </div>
          <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Duration</label>
            <input wire:model="duration" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="duration">
            @error('duration') <span class="error text-red-300">{{ $message }}</span> @enderror
          </div>

          <p class="text-sm text-gray-300">
            <span>File type: .mp4</span>
          </p>
          <div>
            <button type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
              Upload
            </button>
          </div>
        </form>
      </div>
    </div>
    <style>
      .has-mask {
        position: absolute;
        clip: rect(10px, 150px, 130px, 10px);
      }
    </style>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var fileName = ''; // Variable to store the file name

          // Update file name display
          function updateFileName() {
            document.getElementById('fileList').textContent = 'Selected file: ' + fileName;
          }

          // Update file name on file input change
          document.getElementById('fileInput').addEventListener('change', function(event) {
            var fileList = event.target.files;
            fileName = fileList[0].name; // Get the file name
            updateFileName(); // Update the file name display
            // Update hidden input field value
            document.getElementById('hiddenFileName').value = fileName;
          });

          // Trigger file input when text is clicked
          document.getElementById('fileList').addEventListener('click', function() {
            document.getElementById('fileInput').click(); // Trigger click event on file input
          });

          // Retrieve file name from hidden input field, if available
          fileName = document.getElementById('fileInput').value;
          if (fileName) {
            updateFileName();
          }
        });
      </script>
    @endpush



</div>
