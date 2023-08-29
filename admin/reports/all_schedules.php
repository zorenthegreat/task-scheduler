
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Reports</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Schedule Reports</h2>

 <div class="row">
    <div class="col-md-12 head">
        <div class="float-right">
            <a onclick="exportToCSV()" class="btn btn-success"><i class="dwn"></i>Export</a>
        </div>
    </div>
</div>
<div>
        <table  id="myTable" class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Event Title</th>
                <th>Category</th>
                <th>Contact Person</th>
                <th>Email Address</th>
                <th>Date and Time</th>
            </tr>
            </thead>
            <tbody  id="myDiv">
            <?php
            $query = "SELECT * FROM schedule_list";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><?php echo $row['names']; ?></td>
                        <td><?php echo $row['emails']; ?></td>
                        <td><?php echo date('F d, Y g:i A', strtotime($row['schedule_from'])); ?></td> 
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">No Schedule(s) Found...</td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
            </div>
</div>
</body>
</html>

<script type="text/javascript">
function exportToCSV() {
  const table = document.getElementById('myTable');
  const csvRows = [];
  for (let i = 0; i < table.rows.length; i++) {
    const row = table.rows[i];
    const rowData = [];
    for (let j = 0; j < row.cells.length; j++) {
      const cell = row.cells[j];
      const cellValue = cell.textContent.trim();
      rowData.push(`"${cellValue}"`);
    }
    const csvRow = rowData.join(',');
    csvRows.push(csvRow);
  }
  const csvContent = csvRows.join('\n');
  const downloadLink = document.createElement('a');
  downloadLink.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvContent));
  downloadLink.setAttribute('download', 'data.csv');
  downloadLink.style.display = 'none';
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);
}</script>