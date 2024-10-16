@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-bold mb-4">Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Total Movies
                <i class="fa-solid fa-film pt-[2px]" style="color: #8184da; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">1,234</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Total TV Shows
                <i class="fa-solid fa-tv" style="color: #34ad84; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">567</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Categories
                <i class="fa-solid fa-layer-group" style="color: #FFD43B; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">100</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Genres
                <i class="fa-solid fa-icons" style="color: #fd72bc; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">200</p>
        </div>
    </div>
    <div class="mt-12 w-full flex justify-between">
        <div class="w-1/2">
            <h2 class="text-3xl font-bold mb-4">Movies vs TV Shows</h2>
            <canvas id="moviesTvShowsChart"></canvas>
        </div>
        <div class="w-1/2">
            <h2 class="text-3xl font-bold mb-4">Categories and Genres</h2>
            <canvas id="categoriesGenresChart"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Movies vs TV Shows Pie Chart
        var ctx1 = document.getElementById('moviesTvShowsChart').getContext('2d');
        var moviesTvShowsChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Movies', 'TV Shows'],
                datasets: [{
                    data: [1234, 567],
                    backgroundColor: [
                        'rgba(129, 132, 218, 0.5)',
                        'rgba(52, 173, 132, 0.5)'
                    ],
                    borderColor: [
                        'rgba(129, 132, 218, 1)',
                        'rgba(52, 173, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Movies vs TV Shows',
                        font: {
                            size: 24
                        }
                    },
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var dataset = tooltipItem.dataset;
                                var total = dataset.data.reduce(function(previousValue, currentValue) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.dataIndex];
                                var percentage = Math.floor(((currentValue/total) * 100)+0.5);         
                                return currentValue + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });

        // Categories and Genres Bar Chart
        var ctx2 = document.getElementById('categoriesGenresChart').getContext('2d');
        var categoriesGenresChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Categories', 'Genres'],
                datasets: [{
                    label: '# of Items',
                    data: [100, 200],
                    backgroundColor: [
                        'rgba(255, 212, 59, 0.5)',
                        'rgba(253, 114, 188, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 212, 59, 1)',
                        'rgba(253, 114, 188, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Categories and Genres',
                        font: {
                            size: 24
                        }
                    },
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Categories',
                            font: {
                                size: 16
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Items',
                            font: {
                                size: 16
                            }
                        }
                    }
                },
                animation: {
                    duration: 700,
                    easing: 'easeInOutBounce'
                }
            }
        });
    </script>
@endsection

<style>
    #moviesTvShowsChart {
        max-width: 100%;
        max-height: 300px;
        margin-bottom: 4px;
    }
    #categoriesGenresChart {
        max-width: 100%;
        height: 306px;
    }
</style>