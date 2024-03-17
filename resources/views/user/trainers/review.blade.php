<div id="reviewSection">
    @foreach ($reviews as $review)
    <hr>

        <div class="container mt-5">
            <div class="d-flex mb-2">
                @if($review->user->status == 0)
                <img style="width: 100%; height: 100%; max-width: 65px; min-width: 65px; max-height: 65px; min-height: 65px; object-fit: cover; object-position: center; border-radius: 50%; border: 1px solid;
                        "src="/uploads/{{ $review->user->image }}"
                    class="me-3" alt="">
                @else
                <img style="width: 100%; height: 100%; max-width: 65px; min-width: 65px; max-height: 65px; min-height: 65px; object-fit: cover; object-position: center; border-radius: 50%; border: 1px solid;
                        "src="/storage/uploads/{{ $review->user->image }}"
                    class="me-3" alt="">
                    @endif
                <div class="d-flex flex-column me-auto">
                    <div class="pt-1 pb-1">{{ $review->user->first_name }}</div>
                    <div>
                        @php
                            $start = 1;
                        @endphp
                        @while ($start <= 5)
                            @if ($review->rating < $start)
                                <i class="fa-regular fa-star rating-star"></i>
                            @else
                                <i class="fa-solid fa-star rating-star"></i>
                            @endif
                            @php
                                $start++;
                            @endphp
                        @endwhile
                    </div>

                </div>
                @auth                    
                @if ($review->user->id == auth()->user()->id)
                    <div class="d-flex">
                        <a class="me-3 text-success fs-5 collapsible-button" onclick="toggleContent({{ $review->id }})">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a style="cursor: pointer;" class="text-danger fs-5 reviewDelete" data-id="{{ $review->id }}">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                @endif
                @endauth


            </div>
            <div style="color: rgb(148, 136, 136);" class="me-auto mb-3">
                {{ $review->created_at->diffForHumans() }}
            </div>
            <div style="text-align: justify;" class="pe-5">
                <div class="content{{ $review->id }}">
                {{ $review->review }}
            </div>
                
            <form class="collapsible{{$review->id}} d-none" id="updateReviewForm{{$review->id}}">
                @csrf
               <textarea name="review" style="resize: none; max-height: 60px; min-height: 60px;"
               class="form-control">{{$review->review}}</textarea>
               <button type="button" class="btn btn-primary mt-3 reviewUpdate" data-id="{{$review->id}}">Update</button>
            </form>
            </div>
        </div>
    @endforeach
</div>
