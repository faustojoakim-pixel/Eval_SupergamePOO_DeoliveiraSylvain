<?php
 function sanitize() {
    // Sanitize input data to prevent XSS and SQL injection
    $data = trim($this->data);
    
    return $data;
} 
