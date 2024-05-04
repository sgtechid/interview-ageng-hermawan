<x-app-layout>
    <div class="container-fluid py-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">edit a User</h6>
                        </div>
                    </div>
                    <form method="post" action="{{ route('user.management.update', $userById->id) }}">
                        @csrf
                        @method('put')
                        <div class="card-body px-0 pb-2">
                            <div class="row px-4">
                                <div class="col-md-6">
                                    <label> Name : </label>
                                    <div class="input-group input-group-outline form-group my-1">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $userById->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label> Email : </label>
                                    <div class="input-group input-group-outline form-group my-1">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $userById->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row px-4 mt-2">
                                <div class="col-md-12">
                                    <label> Role : </label>
                                    <div class="input-group input-group-outline form-group my-1">
                                        <select class="form-control" name="role" required>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-4">
                                <div class="col-md-12">
                                    <label> Password : </label>
                                    <div class="input-group input-group-outline form-group my-1">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mx-4 my-4" type="submit"> Update a user user </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
