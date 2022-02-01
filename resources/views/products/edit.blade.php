<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('products.update',$product->id) }}" method="post" name="add">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                name
                            </label>
                            <input required value="{{ $product->name }}"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="name" type="text" placeholder="Product name" name="name">
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                Main Category
                            </label>
                            <select name="main_category" id="main_category" required
                                class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                <option value="">Choose A Main Category</option>
                                @foreach ($main_categories as $category )
                                <option value="{{ $category->id }}"
                                    @if ($parent_cat->id== $category->id)
                                    selected
                                    @endif
                                    >{{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                Sub-Category
                            </label>
                            <select name="sub_category" id="sub_category" required
                                class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                <option value="">Choose A Sub-Category</option>
                                @foreach ($parent_cat->childs as $child )
                                <option value="{{ $child->id }}"
                                    @if ($sub_cat->id == $child->id)
                                    selected
                                    @endif
                                    >{{ $child->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <x-button>
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        // sub category dissabled

        $(document).on("change", '#main_category', function (e) {
            var stateUrl = "{{ url('categories/sub')}}";
            $.get(stateUrl,
                    {option: $(this).val()},
                    function (data) {
                        var model = $('#sub_category');
                        model.empty();
                        model.append("<option value=''>Choose a Sub-Category</option>");
                        $("select[name='sub_category']").prop('disabled',false)
                        $.each(data, function (index, element) {
                            model.append("<option value='" + element.id + "'>" + element.name + "</option>");
                        });
                    }
            );
        });

        // Wait for the DOM to be ready
$(function() {
  console.log($("form"));
  $("form[name='add']").validate({
      rules:{
      name: "required",
      main_category:{
        required:true
      },
      sub_category:{
        required:true
      },
    },
    messages: {
      name: "Please Enter Product name",
      main_category: "Please Choose Main Category",
      sub_category: "Please Choose Sub-Category"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
    </script>
</x-app-layout>
