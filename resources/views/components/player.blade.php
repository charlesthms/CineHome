<div>
    <video id="example">
        <source src="{{ asset('storage/arena.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <script>
        let demo = new Moovie({
            selector: "#example",
            dimensions: {
                width: "100%"
            },
            icons: {
                path : '{{ asset('icons') }}/'
            }
        });
    </script>
</div>
