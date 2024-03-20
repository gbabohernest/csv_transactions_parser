<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transactions Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
      main {
          width: min(100% - 1.25rem, 87.5em) ;
          margin-inline: auto;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          padding-top: .5rem;
      }
      table {
          text-align: center;
      }

      tfoot tr th {
          text-align: right;
      }
      tfoot td {
          font-size: 1.2rem;
      }

      h1 {
          font-size: 1.2rem;
          text-align: center;

      }
    </style>
</head>
<body>

<main>
    <h1>Transactions Data</h1>
<table class="table table-sm table-bordered border-secondary table-striped  table-hover">
    <thead class="table-primary">
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php if (! empty($allTransactions)) :?>
            <?php foreach ($allTransactions as $transaction) :?>
                <tr>
                    <th scope="row"><?= $transaction['number'] ?></th>
                    <td><?= formatDate($transaction['date']) ?></td>
                    <td><?= $transaction['checkNumber'] ?></td>
                    <td><?= $transaction['description'] ?></td>

                    <td>
                        <?php if ($transaction['amount'] < 0):?>
                            <span style="color: red;">
                                        <?= formatAmount($transaction['amount']) ?>
                                    </span>

                        <?php elseif($transaction['amount'] > 0):?>
                            <span style="color: green;">
                                        <?= formatAmount($transaction['amount']) ?>
                                    </span>
                        <?php else :?>
                        <?= formatAmount($transaction['amount']) ?>
                    </td>
                    <?php endif?>

                </tr>
            <?php endforeach;?>
        <?php endif ?>
    </tbody>
    <tfoot class="table-group-divider">
    <tr>
        <th colspan="4">Total Income:</th>
        <td><?= formatAmount($total['totalIncome'] ?? 0) ?></td>
    </tr>
    <tr>
        <th colspan="4">Total Expense:</th>
        <td class="text-danger text-bold"><?= formatAmount($total['totalExpense'] ?? 0)?></td>
    </tr>
    <tr>
        <th colspan="4">Net Total:</th>
        <td><?= formatAmount($total['netTotal'] ?? 0)?></td>
    </tr>
    </tfoot>
</table>
</main>
</body>
</html>
