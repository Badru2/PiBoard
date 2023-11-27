<x-app-layout>
    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card border-dark">
                <div class="card-body bg-dark">
                    <h2 class="text-white text-xl">Post</h2>
                    <div class="w-full bg-gray-600 my-2" style="height: 1px"></div>
                    <form action="{{ route('tweets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-white">GAMBAR/VIDEO</label>
                            <input type="file"
                                class="file-input file-input-bordered text-white w-full mt-2 @error('image') is-invalid @enderror"
                                name="image" id="selectImage" multiple>

                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mt-2">
                                <video id="videoPreview" src="#" alt="your video" style="display: none"
                                    controls></video>
                                <img id="imagePreview" src="#" alt="your image" class="mt-3"
                                    style="display:none;" />
                                <audio id="audioPreview" src="#" class="mt-3" style="display: none"
                                    controls></audio>
                            </div>

                        </div>

                        <h2 class="text-white mt-5 mb-3 text-xl">Content</h2>

                        <textarea name="content" id="" class="textarea w-full bg-dark border-black text-light" cols="30"
                            rows="10" placeholder="Tuliskan postingan..."></textarea>

                        <div>
                            <input type="submit" value="Publish"
                                class="btn rounded-full font-bold text-white px-11 my-5"
                                style="background-color: #4AB6FF">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        document.getElementById('selectImage').onchange = function(evt) {
            const videoPreview = document.getElementById('videoPreview');
            const imagePreview = document.getElementById('imagePreview');

            videoPreview.style.display = 'none';
            imagePreview.style.display = 'none';

            const [file] = evt.target.files;

            if (file) {
                const fileURL = URL.createObjectURL(file);

                if (file.type.startsWith('video/')) {
                    // Show video preview
                    videoPreview.src = fileURL;
                    videoPreview.style.display = 'block';
                } else if (file.type.startsWith('image/')) {
                    // Show image preview
                    imagePreview.src = fileURL;
                    imagePreview.style.display = 'block';
                } else {
                    // Handle other file types as needed
                    console.error('Unsupported file type');
                }
            }
        };
    </script>

</x-app-layout>
