<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Introduction;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Resume;

class SoftwareEngineerSeeder extends Seeder
{
    public function run(): void
    {
        // Introduction
        Introduction::truncate();
        Introduction::create([
            'title' => 'Hello, I’m',
            'subtitle' => 'Fahim',
            'description' => 'Software Engineer | Competitive Programmer | Problem Solver'
        ]);

        // About
        About::truncate();
        About::create([
            'image' => 'backend/images/fahim.jpg',
            'description' => '<p>A passionate Software Engineer skilled in C, C++, Java, and Python. Experienced in algorithm design, data structures, and competitive programming. Strong problem-solver with expertise in object-oriented programming, debugging, and writing efficient code. I love tackling challenging problems, building optimized solutions, and participating in coding contests.</p>',
        ]);

        // Resume
        Resume::truncate();
        Resume::create([
            'title' => 'My Resume',
            'sub_title' => 'With strong knowledge in computer science fundamentals and practical coding experience, I specialize in writing optimized solutions and developing applications in C, C++, Java, and Python.',
            'file' => 'backend/resume/software_resume.pdf',
            'updated_year' => now()->year,
        ]);

        // Skills
        Skill::truncate();
        Skill::insert([
            ['title' => 'C'],
            ['title' => 'C++'],
            ['title' => 'Java'],
            ['title' => 'Python'],
            ['title' => 'Algorithms & Data Structures'],
            ['title' => 'Object-Oriented Programming (OOP)'],
            ['title' => 'Competitive Programming'],
            ['title' => 'Problem Solving (Codeforces, LeetCode, HackerRank)'],
            ['title' => 'Git & GitHub'],
        ]);

        // Projects
        Project::truncate();
        Project::create([
            'title' => 'Online Judge Clone',
            'description' => '<p>A competitive programming platform built using Java & Spring Boot, supporting problem statements, test cases, and real-time code submission with evaluation.</p>',
            'link' => 'https://github.com/Faheem2407/OnlineJudge',
            'image' => 'backend/images/projects/oj.png',
        ]);

        Project::create([
            'title' => 'Notepad Application',
            'description' => '<p>A fully functional desktop-based Notepad application built using Java with a rich GUI, supporting file creation, saving, editing, and syntax highlighting.</p>',
            'link' => 'https://github.com/Faheem2407/Notepad-Application',
            'image' => 'backend/images/projects/notepad.png',
        ]);

        Project::create([
            'title' => 'Algorithm Visualizer',
            'description' => '<p>A Python-based visualization tool to demonstrate sorting algorithms, graph algorithms, and recursion for learning purposes.</p>',
            'link' => 'https://github.com/Faheem2407/AlgoVisualizer',
            'image' => 'backend/images/projects/algovisualizer.png',
        ]);
    }
}
