import requests

# URL of the website
url = "http://golbojhi.epizy.com"

try:
    response = requests.get(url)
    if response.status_code == 200:
        print(f"Website reloaded successfully: {response.status_code}")
    else:
        print(f"Failed to reload website: {response.status_code}")
except Exception as e:
    print(f"An error occurred: {e}")
