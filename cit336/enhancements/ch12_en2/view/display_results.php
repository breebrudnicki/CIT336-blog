<?php 
session_start();
include 'header.php';?>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $_SESSION['investment']; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $_SESSION['yearly_percent_formatting']; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $_SESSION['years']; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $_SESSION['future_value']; ?></span><br>
        
        <label>Compound Monthly:</label>
        <span><?php echo $_SESSION['compound_display']; ?></span><br>
    </main>
<?php include 'footer.php'; ?>