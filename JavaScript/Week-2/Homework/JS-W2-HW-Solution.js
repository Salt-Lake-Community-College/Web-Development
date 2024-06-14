// Function to calculate tip and total amount
function calculateTip() {
    // Get the user input values
    const billAmount = parseFloat(document.getElementById('bill-amount').value);
    const tipPercentage = parseFloat(document.getElementById('tip-percentage').value);

    // Validate the input
    if (isNaN(billAmount) || isNaN(tipPercentage) || billAmount <= 0 || tipPercentage < 0) {
        alert('Please enter valid values.');
        return;
    }

    // Calculate the tip amount and total amount
    const tipAmount = billAmount * (tipPercentage / 100);
    const totalAmount = billAmount + tipAmount;

    // Display the results
    document.getElementById('tip-amount').textContent = `Tip Amount: $${tipAmount.toFixed(2)}`;
    document.getElementById('total-amount').textContent = `Total Amount: $${totalAmount.toFixed(2)}`;
}

// Add event listener to the button
document.getElementById('calculate-button').addEventListener('click', calculateTip);
