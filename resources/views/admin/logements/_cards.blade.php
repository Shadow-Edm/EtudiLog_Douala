<div class="grid lg:grid-cols-3 gap-7">

@foreach($logements as $logement)

@include('admin.logements._card')

@endforeach

</div>

<div class="mt-10">

{{ $logements->links() }}

</div>
