<div class="row">
        @foreach ($skills as $skill)
            <div class="col-md-2 mb-4">
                <div class="card p-3 text-center bg-dark text-white">
                    <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="mx-auto mb-3"
                        style="width: 64px; height: 64px;">
                    <h5 class="card-title">{{ $skill->name }}</h5>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-warning btn-sm flex-fill"><i
                                class="fa fa-edit"></i></a>

                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="post"
                            class="delete-form flex-fill m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
