# Curotec Challenge Project's Documentation

## Summary

This Documentation will explain the reasons behind the project architecture, code structure, patterns and styles.

## Back-end of Story-001

The User Story 001 asked for a RESTFul API with endpoints to manipulate Projects, Tasks and Users. I added a Category relation just to enrich the Dashboard experience.

The possible operations are:
- Projects: Create, Edit, List (possible to filter results by name), GetOne, Delete.
- Tasks: Create, Edit, List (always filtering by given project ID), GetOne, Delete.
- Category: Create, Edit, List, GetOne, Delete.
- Users: WIP

