<x-app-layout>
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <x-header title="Dashboard" />
    </div>
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-fluid ">
        
        
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            
                <div class="col-xl">
                    <!--begin::Chart widget 36-->
                    <div class="card card-flush overflow-hidden h-lg-100">
                      
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end ">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_36" class="min-h-auto w-100 ps-4 pe-6" style="height: 300px">
                            </div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Chart widget 36-->
                </div>
                <!--end::Col-->
            </div>
           
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var chartData = @json($chartData);

        // Prepare data for the chart
        var salesData = chartData.sales.map(item => item.amount);
        var servicesData = chartData.services.map(item => item.service_name);
        var categories = chartData.sales.map(item => new Date(item.created_at).toLocaleDateString());

        var options = {
            series: [{
                name: 'Sales',
                data: salesData
            }, {
                name: 'Services',
                data: servicesData
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.2,
                    stops: [15, 120, 100]
                }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            xaxis: {
                categories: categories,
                tickAmount: 6,
                labels: {
                    rotate: 0,
                    style: {
                        fontSize: '12px'
                    }
                },
                tooltip: {
                    enabled: true
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '12px'
                    } 
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                } 
            },
            colors: ['#0d6efd', '#198754'],
            grid: {
                borderColor: '#dee2e6',
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: ['#0d6efd', '#198754'],
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(document.querySelector("#kt_charts_widget_36"), options);
        chart.render();
    </script>
</x-app-layout>
