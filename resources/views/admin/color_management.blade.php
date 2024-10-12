@extends('admin.layouts.app')
@section('color-management')
    @include('admin.partials.color.addColorForm')
    @include('admin.partials.color.deleteColorAlert')
    @include('admin.partials.color.updateColorForm')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
            style="z-index: 9999; top: 6.75rem;">
            <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
            style="z-index: 9999; top: 6.75rem;">
            <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('error') }}
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif
    @if (Session::has('info'))
        <div class="alert alert-warning alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
            style="z-index: 9999; top: 6.75rem;">
            <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('info') }}
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif

    <div class="overflow-x-auto flex flex-col mt-2">
        <div class="flex justify-between my-5">
            <h2 class="text-lg font-medium my-auto">
                Quản lý màu sắc
            </h2>
            <button data-tw-toggle="modal" data-tw-target="#add-color-form" class="btn btn-primary shadow-md mr-2">
                Thêm màu sắc mới
            </button>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Icon</th>
                    <th class="whitespace-nowrap">Tên màu</th>
                    <th class="whitespace-nowrap">Mã hex</th>
                    <th class="whitespace-nowrap">Miêu tả</th>
                    <th class="whitespace-nowrap">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($colors) > 0)
                    @foreach ($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>
                                @if ($color->hex_code)
                                    <div style="width: 20px; height: 20px; background-color: {{ $color->hex_code }};"></div>
                                @else
                                    <img src="{{ $color->icon }}" alt="Color {{ $color->name }} Icon"
                                        style="width: 20px; height: 20px;">
                                @endif
                            </td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->hex_code }}</td>
                            <td>{{ $color->description }}</td>
                            <td>
                                <div class="">
                                    <a class="mr-1">
                                        <button data-tw-toggle="modal" data-tw-target="#update-color-form" type="button"
                                            class="btn btn-outline-warning"
                                            onClick="getColorForUpdate({{ $color->id }}, '{{ $color->name }}', '{{ $color->icon }}', '{{ $color->hex_code }}', '{{ $color->description }}')"><i
                                                class="fa-solid fa-pen-to-square"></i></i><button>
                                    </a>

                                    <a class="mr-1">
                                        <button data-tw-toggle="modal" data-tw-target="#delete-color-form" type="button"
                                            class="btn btn-outline-danger"
                                            onclick="getColorForDelete('{{ $color->name }}', {{ $color->id }})"><i
                                                class="fa-solid fa-trash"></i></i></button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Không có danh mục nào</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm4').filemanager('image', {
            prefix: route_prefix
        });
        $('#lfm5').filemanager('image', {
            prefix: route_prefix
        });

        function getColorForUpdate(id, name, icon, hex_code, description) {
            const form = document.getElementById('update-color-form');
            const fields = {
                id: form.querySelector('#update_id'),
                name: form.querySelector('#update_name'),
                hex: form.querySelector('#update_input_hex'),
                icon: form.querySelector('#update_input_icon'),
                description: form.querySelector('#update_description'),
                colorTypeIcon: form.querySelector('input[name="update_color_type"][value="icon"]'),
                colorTypeHex: form.querySelector('input[name="update_color_type"][value="hex"]')
            };

            fields.id.value = id;
            fields.name.value = name;
            fields.description.value = description;

            if (hex_code) {
                fields.hex.value = hex_code;
                // fields.hex.dispatchEvent(new Event('input', { bubbles: true }));
                // fields.hex.dispatchEvent(new Event('change'));
                fields.colorTypeHex.checked = true;
                document.getElementById('update_hex').style.display = 'block';
                document.getElementById('update_icon').style.display = 'none';
            } else {
                fields.icon.value = icon;
                fields.colorTypeIcon.checked = true;
                console.log(fields.icon);
                document.getElementById('update_icon').style.display = 'block';
                document.getElementById('update_hex').style.display = 'none';
            }

        }

        function getColorForDelete(name, id) {
            document.getElementById('del-color-name').textContent = name;
            document.getElementById('del-color-id').value = id;
        }
    </script>

@endsection
