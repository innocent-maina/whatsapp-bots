# Generated by Django 3.2.7 on 2021-09-17 17:30

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('schools', '0009_auto_20210917_1324'),
    ]

    operations = [
        migrations.AlterField(
            model_name='guardian',
            name='phone',
            field=models.CharField(max_length=20, unique=True),
        ),
        migrations.AlterUniqueTogether(
            name='subscription',
            unique_together={('guardian', 'student')},
        ),
    ]
