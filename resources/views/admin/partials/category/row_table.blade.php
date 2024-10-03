@foreach ($categories as $category)
    <tr class="{{ $is_show ? 'table-row' : 'hidden' }} category-{{ $category->parent_id }}" data-id="{{ $category->id }}">
        <th class="text-center" scope="row">{{ $category->parent_id == null ? $loop->index + 1 : '' }}</th>
        <td class="flex gap-2 items-center">{{ str_repeat('----', $level) }} <img src="{{ $category->icon }}" alt="{{ $category->name }}_icon" width="32" height="32"> {{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>{{ $category->description }}</td>
        <td>
            <div class="">
                <a class="mr-1">
                    <button data-tw-toggle="modal" data-tw-target="#update-category-form" type="button" class="btn btn-outline-warning" onClick="getCateForUpdate({{ $category->id }}, '{{ $category->name }}', '{{ $category->icon }}', '{{ $category->slug }}', '{{ $category->description }}', '{{ $category->parent_id }}', '{{ $category->type }}')"><i
                            class="fa-solid fa-pen-to-square"></i></i><button>
                </a>

                <a class="mr-1">
                    <button data-tw-toggle="modal" data-tw-target="#delete-category-form" type="button" class="btn btn-outline-danger" onclick="getCateForDelete('{{ $category->name }}', {{ $category->id }})"><i class="fa-solid fa-trash"></i></i></button>
                </a>

                @if (count($category->children))
                    <button type="button" class="btn btn-outline-primary"
                        onclick="onOffSubCategory({{ $category->id }})"
                        id="btn_show_more_category_{{ $category->id }}"><i class="fa-solid fa-sort-up"></i></i></button>
                @endif
            </div>
        </td>
    </tr>
    @if (count($category->children))
        @include('admin.partials.category.row_table', [
            'categories' => $category->children,
            'level' => $level + 1,
            'is_show' => false,
        ])
    @endif
@endforeach

<script>
    function onOffSubCategory(id) {
        let elements = document.getElementsByClassName(`category-${id}`);
        if (elements.length > 0) {
            const is_on = getStatus(elements[0]);
            if (is_on) {
                hideSubCategories(elements, id);
            } else {
                showSubCategories(elements, id);
            }
        }
    }

    function hideSubCategories(elements, id) {
        for (let i = 0; i < elements.length; i++) {
            elements[i].classList.remove("table-row");
            elements[i].classList.add("hidden");
            document.getElementById(`btn_show_more_category_${id}`).innerHTML = '<i class="fa-solid fa-caret-up"></i>';
            // Recursively hide child categories
            let childId = elements[i].getAttribute('data-id');
            if (childId) {
                let childElements = document.getElementsByClassName(`category-${childId}`);
                hideSubCategories(childElements, childId);
            }
        }
    }

    function showSubCategories(elements, id) {
        for (let i = 0; i < elements.length; i++) {
            elements[i].classList.remove("hidden");
            elements[i].classList.add("table-row");
            document.getElementById(`btn_show_more_category_${id}`).innerHTML = '<i class="fa-solid fa-sort-down"></i>';
        }
    }

    function getStatus(element) {
        return !element.classList.contains("hidden");
    }

    function getCateForDelete(name, id){
        document.getElementById('del-category-name').textContent = name;
        document.getElementById('del-category-id').value = id;
    }

    function getCateForUpdate(id, name, icon, slug, description, parent_id, type) {
        const form = document.getElementById('update-category-form');
        const fields = {
            id: form.querySelector('#id'),
            name: form.querySelector('#name'),
            slug: form.querySelector('#slug'),
            icon: form.querySelector('#icon'),
            description: form.querySelector('#description'),
            parentId: form.querySelector('#parent_id'),
            type: form.querySelector('#cate_type')
        };

        fields.id.value = id;
        fields.name.value = name;
        fields.icon.value = icon;
        fields.slug.value = slug;
        fields.description.value = description;

        // Set the selected attribute for the parent_id option
        Array.from(fields.parentId.options).forEach(option => {
            option.selected = option.value == parent_id;
        });

        // Set the selected attribute for the type option
        Array.from(fields.type.options).forEach(option => {
            option.selected = option.value == type;
        });
    }

</script>
