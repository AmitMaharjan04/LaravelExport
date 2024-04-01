@extends('master')

@section('header')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group has-feedback ">
                <label for="file">Upload JSON File</label>
                <input type="file" class="form-control" autofocus="" id="file" name="file">
                <span class="help-block error-msg"></span>
                {!! $errors->first('file', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-1">
            <input type="submit" class="btn btn-primary btn-block"></input>
        </div>
        <div class="col-md-2 d-flex align-items-center">
            @if($check && Storage::exists($path))
                <a href="{{route('download-export', ['path' => $fileName])}}">Download File</a>
        {{-- <a href="#" onclick="downloadFile()">Download File</a> --}}
            @elseif($check)
                <script>
                    setTimeout(function() {
                        window.location.reload();
                    }, 5000); 
                </script>
            @else
            @endif
        </div>
    </div>
</form>
@stop

@push('js-stack')
{{-- <script type="text/javascript">
 function downloadFile() {
        // Replace 'full/path/to/your/file' with the actual path to your file
        var filePath = '{{ $path }}';
        
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        
        // Define the request parameters
        xhr.open('POST', '{{ route("download-export") }}', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.setRequestHeader('Content-Type', 'application/json');
        
        // Define the callback function to handle the response
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle success response
                } else {
                    // Handle error response
                }
            }
        };
        
        // Send the request with the file path as JSON data
        xhr.send(JSON.stringify({ filePath: filePath }));
    }
</script>  --}}
@endpush
