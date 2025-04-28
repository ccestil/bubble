

views to create in this customer folder.

---------------GLOBAL--------------

layout.blade.php [x]
    - this will hold the contents of the dashboard

nav-bar.blade.php [x]
    - we will put the navigation links here
    - we will put this inside the layout


---------------CONTENTS---------------

create-transaction.blade.php [x]
    - FORM to creat transaction 
    - BUTTON - [done] redirect to dashboard.blade.php

status-card.blade.php 
    - as it says, this will hold the content of the status card

transaction-card.blade.php 
    - this will hold the details about the transactions
    - a pay button

transaction-reciept.blade.php
    - summary of the transaction to pay

history-card.blade.php
    - CARD for the history table
    - will include all content of the card
    - only read mode here

profile.blade.php 
    - CARD for the customer profile information
    - BUTTON - update and delete button

update-profile.blade.php
    - FORM to update the customer Personal information
    - BUTTONS - cancel and apply update


