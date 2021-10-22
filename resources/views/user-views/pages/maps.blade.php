@extends('user-views.layouts.app')
@push('addon-style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<style>
    #mapid {
        height: 720px;
    }

</style>
@endpush

@section('name')
MAPS
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Page Layout-->
            <div class="d-flex flex-row">
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Section-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder font-size-h3 text-dark">Lokasi Bengkel</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">Continue
                                        Shopping</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <div class="card-body">
                            <div class="container">
                                <div id="mapid">

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Section-->

                </div>
            </div>
            <!--end::Page Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>








<!--end::Content-->
@endsection


@push('addon-script')
<script>
    var map = ""

    var BengkelIcon = L.icon({
        iconUrl: 'user-assets/icon/bengkel.png',
        iconSize: [35, 35],
        iconAnchore: [22, 94],
        popupAnchore: [-3, -76]
    });

    $(document).ready(function () {
        map = L.map('mapid').fitWorld();
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiYXJ0YW5pbGExNSIsImEiOiJja29hN2IxeW0weWRlMm9zMnA3eTlmem04In0.O2Mk0N3OYzJ40NXBuOCevQ'
            }).addTo(map);

        function onLocationFound(e) {

            map.flyTo(e.latlng, 10)
            L.marker(e.latlng).addTo(map)
                .bindPopup("You are here").openPopup();
                
        }

        function onLocationError(e) {
            alert(e.message);
        }

        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);

        map.locate({
            setView: true,
            maxZoom: 10
        });


        $.getJSON('maps/databengkel', function (data) {

            $.each(data, function (index) {
                var marker = L.marker([data[index].latitude, data[index].longitude], {
                    icon: BengkelIcon
                }).addTo(map).on('click', function (e) {
                    var html =
                        '<div class="card-body"><div class="d-flex justify-content-between flex-column pt-4 "><div class="pb-5"><div class="d-flex flex-column flex-center">'
                    html +=
                        '<div class="bgi-no-repeat bgi-size-cover rounded min-h-180px w-100" style="background-image: url(https://inventory.bengkel-kuy.com/image/' +
                        data[index].logo_bengkel + ')"></div>'
                    html += '</div>'
                    html += '<a href="/bengkel/' + data[index].slug +
                        '" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">' +
                        data[index].nama_bengkel + '</a>'
                    html +=
                        '<div class="font-weight-bold text-dark-50 font-size-sm pb-6">' +
                        data[index].nohp_bengkel + '</div></div></div>'
                    html += '<div class="d-flex flex-center" >'
                    html += '<a href="http://maps.google.com/?q=' + data[index]
                        .latitude + ',' + data[index].longitude +
                        '" target="_blank" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" >Lihat di Google Maps</a></div></div></div>'

                    L.popup()
                        .setLatLng([data[index].latitude, data[index].longitude])
                        .setContent(html)
                        .openOn(map);

                });
            });
        });
    });

</script>
@endpush
