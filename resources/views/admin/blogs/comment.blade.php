<div id="commentSection">
    @if($comments->count() == 0)
        <div class="text-danger">
            There are no comments.
        </div>
        @else
    @foreach ($comments as $comment)
        <div class="container mt-3 mb-2">
            <div class="d-flex mb-2">
                @if ($comment->user->status == 1)
                    <img style="width: 100%; height: 100%; max-width: 60px; min-width: 60px; max-height: 60px; min-height: 60px; object-fit: cover; object-position: center; border-radius: 50%;
                            "src="/storage/uploads/{{ $comment->user->image }}"
                        class="mr-3" alt="">
                @else
                    <img style="width: 100%; height: 100%; max-width: 60px; min-width: 60px; max-height: 60px; min-height: 60px; object-fit: cover; object-position: center; border-radius: 50%;
                                    "src="/uploads/{{ $comment->user->image }}"
                        class="mr-3" alt="">
                @endif

                <div class="d-flex flex-column mr-auto">
                    <div class="pt-1 pb-1">{{ $comment->user->name }}</div>
                    <div style="color: rgb(148, 136, 136);" class="">{{ $comment->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="d-flex pt-2">
                    <a style="cursor: pointer;" class="text-danger commentDelete" data-id="{{ $comment->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>

            <div style="text-align: justify;" class="pe-5 mt-3 ps-1">
                <div class="content{{ $comment->id }}">
                    {{ $comment->comment }}
                </div>

                <form class="collapsible{{ $comment->id }} d-none" id="updateReviewForm{{ $comment->id }}">
                    @csrf
                    <textarea name="comment" style="resize: none; max-height: 60px; min-height: 60px;" class="form-control">{{ $comment->comment }}</textarea>
                    <button type="button" class="btn btn-primary mt-3 reviewUpdate"
                        data-id="{{ $comment->id }}">Update</button>
                </form>
            </div>
        </div>
        <hr>
    @endforeach
    @endif

</div>
