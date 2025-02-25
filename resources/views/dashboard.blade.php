@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
@if (auth()->user()->branch_id == 1)
<!-- Dashboard Cabang -->
<div class="page-heading">
    <h3>Hi 👋, {{ auth()->user()->name }}</h3>
</div>

<section class="section">
    <h2 class="mb-4 text-center">Laporan Keuangan</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Keluar Masuk</h4>
                </div>
                <div class="card-body">
                    <div id="incomeExpenseChart1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Keluar Masuk Cabang</h4>
                </div>
                <div class="card-body">
                    <div id="branchChart1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Laba Rugi</h4>
                </div>
                <div class="card-body">
                    <div id="profitLossChart1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Cashflow</h4>
                </div>
                <div class="card-body">
                    <div id="cashFlowChart1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Posting Akun</h4>
                </div>
                <div class="card-body">
                    <div id="accountTypeChart1"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    let transactionAll = @json($transactionAll, JSON_NUMERIC_CHECK);
    let branchAll = @json($branchAll, JSON_NUMERIC_CHECK);
    let accountTypeAll = @json($accountTypeAll, JSON_NUMERIC_CHECK);
    let profitLossAll = @json($profitLossAll, JSON_NUMERIC_CHECK);
    let cashFlowAll = @json($cashFlowAll, JSON_NUMERIC_CHECK);

    let monthAll = [...new Set(transactionAll.map(t => t.month))];
    let incomeDataAll = monthAll.map(m => transactionAll.find(t => t.month == m && t.transaction_type == "Pemasukan")?.total || 0);
    let expenseDataAll = monthAll.map(m => transactionAll.find(t => t.month == m && t.transaction_type == "Pengeluaran")?.total || 0);

    new ApexCharts(document.querySelector("#incomeExpenseChart1"), {
        chart: {
            type: 'line'
        },
        series: [{
                name: 'Pemasukan',
                data: incomeDataAll
            },
            {
                name: 'Pengeluaran',
                data: expenseDataAll
            }
        ],
        xaxis: {
            categories: monthAll
        }
    }).render();

    let branchNameAll = [...new Set(branchAll.map(b => b.branch.name))];
    let branchIncomeAll = branchNameAll.map(b => branchAll.find(t => t.branch.name == b && t.transaction_type == "Pemasukan")?.total || 0);
    let branchExpenseAll = branchNameAll.map(b => branchAll.find(t => t.branch.name == b && t.transaction_type == "Pengeluaran")?.total || 0);

    new ApexCharts(document.querySelector("#branchChart1"), {
        chart: {
            type: 'bar'
        },
        series: [{
                name: 'Pemasukan',
                data: branchIncomeAll
            },
            {
                name: 'Pengeluaran',
                data: branchExpenseAll
            }
        ],
        xaxis: {
            categories: branchNameAll
        }
    }).render();

    let profitDataAll = monthAll.map(m => profitLossAll.find(t => t.month == m)?.profit || 0);
    new ApexCharts(document.querySelector("#profitLossChart1"), {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'Laba Rugi',
            data: profitDataAll
        }],
        xaxis: {
            categories: monthAll
        }
    }).render();

    let cashDataAll = monthAll.map(m => cashFlowAll.find(t => t.month == m)?.balance || 0);
    new ApexCharts(document.querySelector("#cashFlowChart1"), {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'Saldo Berjalan',
            data: cashDataAll
        }],
        xaxis: {
            categories: monthAll
        }
    }).render();

    let accountNameAll = accountTypeAll.map(a => a.account_type.name);
    let accountTotalAll = accountTypeAll.map(a => a.total);

    new ApexCharts(document.querySelector("#accountTypeChart1"), {
        chart: {
            type: 'pie'
        },
        series: accountTotalAll,
        labels: accountNameAll
    }).render();
</script>



@else
<!-- Dashboard Cabang -->
<div class="page-heading">
    <h3>Hi 👋, {{ auth()->user()->name }} | Regional {{$regional}}</h3>
</div>

<div class="container">
    <h2 class="mb-4 text-center">Laporan Keuangan</h2>
    <div class="row">
        <div class="col-md-6">
            <div id="incomeExpenseChart"></div>
        </div>
        <div class="col-md-6">
            <div id="profitLossChart"></div>
        </div>
        <div class="col-md-6">
            <div id="cashFlowChart"></div>
        </div>
        <div class="col-md-6">
            <div id="accountTypeChart"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    let transactions = @json($transactions, JSON_NUMERIC_CHECK);
    let accountTypes = @json($accountTypes, JSON_NUMERIC_CHECK);
    let profitLoss = @json($profitLoss, JSON_NUMERIC_CHECK);
    let cashFlow = @json($cashFlow, JSON_NUMERIC_CHECK);

    let months = [...new Set(transactions.map(t => t.month))];
    let incomeData = months.map(m => transactions.find(t => t.month == m && t.transaction_type == "Pemasukan")?.total || 0);
    let expenseData = months.map(m => transactions.find(t => t.month == m && t.transaction_type == "Pengeluaran")?.total || 0);

    new ApexCharts(document.querySelector("#incomeExpenseChart"), {
        chart: {
            type: 'line'
        },
        series: [{
                name: 'Pemasukan',
                data: incomeData
            },
            {
                name: 'Pengeluaran',
                data: expenseData
            }
        ],
        xaxis: {
            categories: months
        }
    }).render();

    let profitData = months.map(m => profitLoss.find(t => t.month == m)?.profit || 0);
    new ApexCharts(document.querySelector("#profitLossChart"), {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'Laba Rugi',
            data: profitData
        }],
        xaxis: {
            categories: months
        }
    }).render();

    let cashData = months.map(m => cashFlow.find(t => t.month == m)?.balance || 0);
    new ApexCharts(document.querySelector("#cashFlowChart"), {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'Saldo Berjalan',
            data: cashData
        }],
        xaxis: {
            categories: months
        }
    }).render();

    let accountNames = accountTypes.map(a => a.account_type.name);
    let accountTotals = accountTypes.map(a => a.total);

    new ApexCharts(document.querySelector("#accountTypeChart"), {
        chart: {
            type: 'pie'
        },
        series: accountTotals,
        labels: accountNames
    }).render();
</script>

@endif
@endsection