<div class="row">
    @forelse ($properties as $property)
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="property-item mb-30">
                <a href="{{ route('site.show', $property->id) }}" class="img">
                    <img src="{{ asset('uploads/' . $property->main_image) }}" alt="Image" class="img-fluid" />
                </a>

                <div class="property-content">
                    <div class="price mb-2"><span>${{ $property->price }}</span></div>
                    <div>
                        <span class="d-block mb-2 text-black-50">{{ $property->address }}, {{ $property->city }}</span>
                        <span class="city d-block mb-3">{{ $property->address }} , {{ $property->city }}</span>

                        <div class="specs d-flex mb-4">
                            <span class="d-block d-flex align-items-center me-3">
                                <span class="icon-bed me-2"></span>
                                <span class="caption">{{ $property->bed_rooms }} beds</span>
                            </span>
                            <span class="d-block d-flex align-items-center">
                                <span class="icon-bath me-2"></span>
                                <span class="caption">{{ $property->bath_rooms }} baths</span>
                            </span>
                        </div>

                        <a href="{{ route('site.show', $property->id) }}" class="btn btn-primary py-2 px-3">See details</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted fw-bold">Properties Not Found</p>
        </div>
    @endforelse
</div>



@section('script')

    @if (request()->has('query') && $properties->count() > 0)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('DOMContentLoaded fired'); // إضافة هذه السطر لاختبار تنفيذ الكود

                window.onload = function() { // التأكد من تحميل الصفحة بشكل كامل
                    const propertiesSection = document.getElementById('properties-list');
                    const searchInput = document.querySelector('input[name="query"]'); // حقل الإدخال للبحث

                    if (propertiesSection) {
                        console.log('Found properties section'); // تحقق من العثور على العنصر
                        propertiesSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // ضبط التركيز على حقل البحث
                        if (searchInput) {
                            searchInput.focus();
                        }
                    }
                };
            });
        </script>
    @endif



@stop
