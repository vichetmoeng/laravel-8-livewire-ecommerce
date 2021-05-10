<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td>
                                                @if($slider->image)
                                                    <img src="{{ asset('assets/images/sliders') }}/{{$slider->image}}" width="120" alt="">
                                                @else
                                                    <img src="{{ asset('assets/images/sliders/noimage.png') }}" width="120" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->subtitle }}</td>
                                            <td>{{ $slider->price }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $slider->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.edithomeslider', ['id' => $slider->id]) }}"><i class="fa fa-edit fa-2x text-info"></i> </a>
                                                <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{ $slider->id }})"><i class="fa fa-times text-danger fa-2x" style="padding: 0 10px;"></i> </a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
