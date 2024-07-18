<?php
include('header.php');
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit();
}
?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
<!-- =============================================== -->
<?php 
include('form.php');
$frm = new formBuilder;
?>
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <h3>Payment</h3>
            <form action="process_payment.php" method="post" id="form1" class="form-container">
                <div class="form-group">
                    <label class="control-label">Payment Method</label>
                    <select class="form-control" name="payment_method" id="payment_method" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                
                <!-- Credit Card Info -->
                <div id="credit_card_info" class="payment-info">
                    <div class="form-group">
                        <label for="cc_number">Credit Card Number</label>
                        <input type="Number" class="form-control" id="cc_number" name="cc_number" required>
                    </div>
                    <div class="form-group">
                        <label for="cc_expiry">Expiry Date</label>
                        <input type="date" class="form-control" id="cc_expiry" name="cc_expiry" required>
                    </div>
                    <div class="form-group">
                        <label for="cc_cvv">CVV</label>
                        <input type="text" class="form-control" id="cc_cvv" name="cc_cvv" required>
                    </div>
                </div>
                
                <!-- Debit Card Info -->
                <div id="debit_card_info" class="payment-info">
                    <div class="form-group">
                        <label for="dc_number">Debit Card Number</label>
                        <input type="number" class="form-control" id="dc_number" name="dc_number" required>
                    </div>
                    <div class="form-group">
                        <label for="dc_expiry">Expiry Date</label>
                        <input type="date" class="form-control" id="dc_expiry" name="dc_expiry" required>
                    </div>
                    <div class="form-group">
                        <label for="dc_cvv">CVV</label>
                        <input type="text" class="form-control" id="dc_cvv" name="dc_cvv" required>
                    </div>
                </div>
                
                <!-- PayPal Info -->
                <div id="paypal_info" class="payment-info">
                    <div class="form-group">
                        <label for="paypal_email">PayPal Email</label>
                        <input type="email" class="form-control" id="paypal_email" name="paypal_email" required>
                    </div>
                    <div class="form-group">
                        <label for="paypal_amount">Amount</label>
                        <input type="number" class="form-control" id="paypal_amount" name="paypal_amount" required>
                    </div>
                    <div class="form-group">
                        <label for="paypal_address">PayPal Address</label>
                        <input type="text" class="form-control" id="paypal_address" name="paypal_address" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success" style="margin-bottom: 150px">Make Payment</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentMethodSelect = document.getElementById('payment_method');
        const creditCardInfo = document.getElementById('credit_card_info');
        const debitCardInfo = document.getElementById('debit_card_info');
        const paypalInfo = document.getElementById('paypal_info');
        
        function updatePaymentInfo() {
            const selectedMethod = paymentMethodSelect.value;
            creditCardInfo.style.display = selectedMethod === 'credit_card' ? 'block' : 'none';
            debitCardInfo.style.display = selectedMethod === 'debit_card' ? 'block' : 'none';
            paypalInfo.style.display = selectedMethod === 'paypal' ? 'block' : 'none';
        }
        
        paymentMethodSelect.addEventListener('change', updatePaymentInfo);
        
        // Initial call to set the correct payment info visibility
        updatePaymentInfo();
        
        // Bootstrap Validator configuration
        $('#form1').bootstrapValidator({
            // To use feedback icons, use below option
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                cc_number: {
                    validators: {
                        notEmpty: {
                            message: 'The credit card number is required'
                        },
                        regexp: {
                            regexp: /^[0-9]{16}$/,
                            message: 'The credit card number must be a 16-digit number'
                        }
                    }
                },
                cc_expiry: {
                    validators: {
                        notEmpty: {
                            message: 'The expiry date is required'
                        },
                        regexp: {
                            regexp: /^(0[1-9]|1[0-2])\/[0-9]{2}$/,
                            message: 'The expiry date must be in MM/YY format'
                        }
                    }
                },
                cc_cvv: {
                    validators: {
                        notEmpty: {
                            message: 'The CVV number is required'
                        },
                        regexp: {
                            regexp: /^[0-9]{3}$/,
                            message: 'The CVV number must be a 3-digit number'
                        }
                    }
                },
                dc_number: {
                    validators: {
                        notEmpty: {
                            message: 'The debit card number is required'
                        },
                        regexp: {
                            regexp: /^[0-9]{16}$/,
                            message: 'The debit card number must be a 16-digit number'
                        }
                    }
                },
                dc_expiry: {
                    validators: {
                        notEmpty: {
                            message: 'The expiry date is required'
                        },
                        regexp: {
                            regexp: /^(0[1-9]|1[0-2])\/[0-9]{2}$/,
                            message: 'The expiry date must be in MM/YY format'
                        }
                    }
                },
                dc_cvv: {
                    validators: {
                        notEmpty: {
                            message: 'The CVV number is required'
                        },
                        regexp: {
                            regexp: /^[0-9]{3}$/,
                            message: 'The CVV number must be a 3-digit number'
                        }
                    }
                },
                paypal_email: {
                    validators: {
                        notEmpty: {
                            message: 'The PayPal email address is required'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
                paypal_amount: {
                    validators: {
                        notEmpty: {
                            message: 'The amount is required'
                        },
                        numeric: {
                            message: 'The amount must be a numeric value'
                        }
                    }
                },
                paypal_address: {
                    validators: {
                        notEmpty: {
                            message: 'The PayPal address is required'
                        }
                    }
                }
            }
        });
    });
</script>

<?php include('footer.php'); ?>
</div>
