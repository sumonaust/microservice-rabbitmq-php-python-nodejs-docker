FROM python:3.9

WORKDIR /app

COPY ./python-app/requirements.txt .

RUN pip install --no-cache-dir -r requirements.txt

COPY ./python-app/consumer.py ./

CMD ["python", "consumer.py"]

