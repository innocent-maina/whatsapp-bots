# Generated by Django 3.2.7 on 2021-09-17 10:24

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('schools', '0008_pricingmodel_code'),
    ]

    operations = [
        migrations.AddField(
            model_name='student',
            name='branch',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, to='schools.branch'),
        ),
        migrations.AlterUniqueTogether(
            name='student',
            unique_together={('student_code', 'branch')},
        ),
    ]