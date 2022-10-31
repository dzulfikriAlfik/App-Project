<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/visualization/echarts/echarts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/charts/echarts/bars_tornados.js') ?>"></script>
<?php
$data = $this->session->flashdata('sukses');
if ($data != "") { ?>
    <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
<?php } ?>
<?php
$data2 = $this->session->flashdata('error');
if ($data2 != "") { ?>
    <div class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
<?php } ?>
<div class="panel panel-flat">
    <div class="panel-body">
        <div class="chart-container">
            <div class="col-md-6">
                <center><i class="label label-info"><strong>Berdasarkan Jenis Kelamin</strong></i></center>
                <hr>
                <center>
                    <div class="chart has-fixed-height" id="basic_bars"></div>
                </center>
            </div>
            <div class="col-md-6">
                <center><i class="label label-success"><strong>Berdasarkan Status</strong></i></center>
                <hr>
                <center>
                    <div class="chart has-fixed-height" id="basic_line"></div>
                </center>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-flat">
    <div class="panel-body">
        <div class="chart-container">
            <div class="col-md-6 col-md-offset-3">
                <center><i class="label label-warning"><strong>Berdasarkan Mutasi Masuk/Keluar</strong></i></center>
                <hr>
                <center>
                    <div class="chart has-fixed-height" id="basic_line1"></div>
                </center>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        require.config({
            paths: {
                echarts: 'assets/js/plugins/visualization/echarts'
            }
        });
        require(
            [
                'echarts',
                'echarts/theme/limitless',
                'echarts/chart/bar',
                'echarts/chart/line'
            ],
            function(ec, limitless) {
                var basic_bars = ec.init(document.getElementById('basic_bars'), limitless);
                var basic_line = ec.init(document.getElementById('basic_line'), limitless);
                var basic_line1 = ec.init(document.getElementById('basic_line1'), limitless);

                // bars laki/perempuan
                basic_bars_options = {
                    grid: {
                        x: 40,
                        x2: 40,
                        y: 35,
                        y2: 25
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['Laki-Laki', 'Perempuan']
                    },
                    calculable: true,
                    xAxis: [{
                        type: 'value',
                        boundaryGap: [0, 1]
                    }],
                    yAxis: [{
                        type: 'category',
                        data: ['']
                    }],
                    series: [{
                            name: 'Laki-Laki',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#ef8a50'
                                }
                            },
                            data: [<?php echo $this->db->query("select nik from penduduk where jk='Laki-laki'")->num_rows(); ?>]
                        },
                        {
                            name: 'Perempuan',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#66bb89'
                                }
                            },
                            data: [<?php echo $this->db->query("select nik from penduduk where jk='Perempuan'")->num_rows(); ?>]
                        }
                    ]
                };

                // bars hidup/meninggal
                basic_line_options = {
                    grid: {
                        x: 40,
                        x2: 40,
                        y: 35,
                        y2: 25
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['Hidup', 'Meninggal']
                    },
                    calculable: true,
                    yAxis: [{
                        type: 'value',
                        boundaryGap: [0, 1]
                    }],
                    xAxis: [{
                        type: 'category',
                        data: ['']
                    }],
                    series: [{
                            name: 'Hidup',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#66BB6A'
                                }
                            },
                            data: [<?php echo getjumstatus(1); ?>]
                        },
                        {
                            name: 'Meninggal',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#EF5350'
                                }
                            },
                            data: [<?php echo getjumstatus(2); ?>]
                        }
                    ]
                };

                // bars masuk/keluar
                basic_line1_options = {
                    grid: {
                        x: 40,
                        x2: 40,
                        y: 35,
                        y2: 25,
                        z: 20,
                        z2: 20
                    },
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ['Masuk', 'Keluar', 'Warga Asli']
                    },
                    calculable: true,
                    yAxis: [{
                        type: 'value',
                        boundaryGap: [0, 1, 2]
                    }],
                    xAxis: [{
                        type: 'category',
                        data: ['']
                    }],
                    series: [{
                            name: 'Masuk',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#66BB6A'
                                }
                            },
                            data: [<?php echo getjummutasi(1); ?>]
                        },
                        {
                            name: 'Keluar',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#EF5350'
                                }
                            },
                            data: [<?php echo getjummutasi(2); ?>]
                        },
                        {
                            name: 'Warga Asli',
                            type: 'bar',
                            itemStyle: {
                                normal: {
                                    color: '#69655d'
                                }
                            },
                            data: [<?php echo getjummutasi(3); ?>]
                        }
                    ]
                };

                // Apply options
                // ------------------------------
                basic_bars.setOption(basic_bars_options);
                basic_line.setOption(basic_line_options);
                basic_line1.setOption(basic_line1_options);
                window.onresize = function() {
                    setTimeout(function() {
                        basic_columns.resize();
                        basic_bars.resize();
                        basic_line.resize();
                        basic_line1.resize();
                    }, 200);
                }
            }
        );
    });
</script>