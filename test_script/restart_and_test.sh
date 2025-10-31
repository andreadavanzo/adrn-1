#!/bin/bash
# This script restarts Apache2 and PHP, then runs test.sh twice with different log directories.

# Exit on error
set -e

# Restart Apache and PHP services
echo "Restarting Apache2 and PHP-FPM..."
sudo systemctl restart apache2.service
sudo systemctl restart php8.1-fpm.service
echo "Services restarted successfully."

# Run tests
echo "Running first test..."
./test.sh ../test_log/test-restart --restart

echo "Running second test..."
./test.sh ../test_log/test-second

echo "All tests completed successfully."
