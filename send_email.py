import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
from datetime import datetime

def send_email(gmail_user, gmail_password, to_email):
    try:
        # Email content
        subject = "Automated Notification"
        body = f"This is an automated notification sent at {datetime.now()}."

        # Create the email
        msg = MIMEMultipart()
        msg["From"] = gmail_user
        msg["To"] = to_email
        msg["Subject"] = subject
        msg.attach(MIMEText(body, "plain"))

        # Connect to Gmail server and send email
        with smtplib.SMTP("smtp.gmail.com", 587) as server:
            server.starttls()  # Secure the connection
            server.login(gmail_user, gmail_password)
            server.send_message(msg)

        print(f"Email sent successfully at {datetime.now()}")
    except Exception as e:
        print(f"Failed to send email: {e}")

if __name__ == "__main__":
    import os
    gmail_user = os.getenv("GMAIL_USER")
    gmail_password = os.getenv("GMAIL_PASSWORD")
    to_email = os.getenv("TO_EMAIL")
    send_email(gmail_user, gmail_password, to_email)
