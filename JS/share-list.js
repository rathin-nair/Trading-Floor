var app = angular.module('trad', ['ngRoute']);

app.controller('shareCtrl', function($scope){
    $scope.boughtShares = [
        {
            'symbol': 'A',
            'sname': 'AGILENT TECHNOLOGIES INC',
            'shares': 5,
            'price': 150.5,
            'total': 752.5
        },
        {
            'symbol': 'AA',
            'sname': 'ALCOA CORP',
            'shares': 5,
            'price': 110,
            'total': 550
        },
        {
            'symbol': 'AAA',
            'sname': 'AAF FIRST PRIORITY CLO BOND',
            'shares': 5,
            'price': 100,
            'total': 500
        },
        {
            'symbol': 'AAAU',
            'sname': 'GOLDMAN SACHS PHYSICAL GOLD',
            'shares': 5,
            'price': 120,
            'total': 600
        },
        {
            'symbol': 'AAC',
            'sname': 'ARES ACQUISITION CORP-A',
            'shares': 5,
            'price': 80,
            'total': 400
        }
    ]
    $scope.getGrandTotal = function(){
        var gtotal = 0;
        for(var i = 0; i < $scope.boughtShares.length; i++){
            var tot = $scope.boughtShares[i];
            gtotal += tot.total;
        }
        return gtotal + $scope.getWallet();
    }
    $scope.getWallet = function(){
        var walletAmount = 10000;
        return walletAmount
    }
});

app.controller('showQuote', function($scope){
    
});
